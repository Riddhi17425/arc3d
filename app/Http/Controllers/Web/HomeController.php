<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\CareerApplication;
use App\Models\Contact;
use App\Models\ExceedsExpectations;
use App\Models\FeatureProject;
use App\Models\Gallery;
use App\Models\HowItWorks;
use App\Models\Industries;
use App\Models\Printing;
use App\Models\ServiceInquires;
use App\Models\Services;
use App\Models\Teams;
use App\Models\Technologies;
use App\Models\TrustedPartner;
use App\Models\WhatsappInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Intervention\Image\ImageManager;

class HomeController extends Controller
{
    public function index()
    {
        $title          = "3D Printing Company in Abu Dhabi, UAE | 3D Printing Expert";
        $description    = "Professional 3D design, 3D printing, 3D scanning, prototyping, and 3D modeling services in Abu Dhabi, serving Dubai and the UAE, for architectural, industrial, and engineering projects.";
        $our_services   = Services::where('status', 'Active')->orderBy('id', 'Desc')->get();
        $client_reviews = \App\Models\ClientReview::where('status', 'Active')
            ->orderBy('id', 'Desc')
            ->get();

        $industries           = Industries::where('status', 'Active')->orderBy('id', 'asc')->get();
        $our_trusted_partners = TrustedPartner::where('status', 'Active')->orderBy('id', 'Desc')->get();
        $technologies         = Technologies::where('status', 'Active')->orderBy('id', 'Desc')->get();
        $featureProjects      = FeatureProject::where('status', 'Active')->where('home_status', 'Yes')->orderBy('index_id', 'Asc')->take(8)->get();
        return view('front.dashboard', compact(
            'title', 'description', 'our_services', 'industries',
            'our_trusted_partners', 'technologies', 'featureProjects',
            'client_reviews'
        ));
    }

    public function story()
    {
        $title       = "Our Story | Advanced 3D Printing & Model Making Solutions";
        $description = "ARC 3D is a technologically advanced UAE-based company specializing in 3D printing, 3D modeling, architectural mockups, and 3D animation services.";
        return view('front.story', compact('title', 'description'));
    }

    public function our_process()
    {
        $title       = "Professional 3D Printing Process & Services in UAE";
        $description = "Turn ideas into reality with ARC 3D’s expert 3D printing & prototyping services in UAE, delivering accurate models for architecture, design, and industry.";
        $gallery     = Gallery::where('gallery_type', 'process')->where('status', 'Active')->orderBy('id', 'Desc')->get(['image', 'alt_tag']);
        // return $gallery;
        return view('front.our_process', compact('title', 'description', 'gallery'));
    }

    public function our_team()
    {
        $title       = "Meet Our Expert 3D Printing & 3D Modeling Team";
        $description = "Meet ARC 3D’s expert team in UAE—designers, engineers, and project managers turning ideas into precise 3D printed models with cutting-edge technology.";
        $teams       = Teams::where('status', 'Active')->orderBy('id', 'Desc')->get();
        $gallery     = Gallery::where('gallery_type', 'teams')->where('status', 'Active')->orderBy('id', 'Desc')->get();

        return view('front.our_team', compact('title', 'description', 'teams', 'gallery'));
    }

    public function contact()
    {
        $title       = "Contact Us For 3D Printing in Abu Dhabi & Dubai";
        $description = "Looking for 3D printing services in Abu Dhabi & Dubai? ARC 3D delivers high-quality 3D printing to bring your designs to life. Call +971542797571.";
        return view('front.contact', compact('title', 'description'));
    }

    public function career()
    {
        $title       = "Career Build the Future With ARC 3D";
        $description = "Join ARC 3D UAE’s team of innovators and creators redefining architecture with cutting-edge 3D printing, bold ideas, and immersive design solutions.";
        return view('front.career', compact('title', 'description'));
    }

    public function showCaptcha(Request $request)
    {
        $width  = 150;
        $height = 60;

                                      // Generate random captcha text
        $characters   = '0123456789'; // Only numbers like in your image
        $captcha_text = '';
        for ($i = 0; $i < 4; $i++) { // 4 digits like your example
            $captcha_text .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Store captcha in session
        session(['captcha_code' => $captcha_text]);

        // Create ImageManager with GD driver
        $manager = ImageManager::gd();
        $img     = $manager->create($width, $height)->fill('#f8f8f8'); // Light gray background

        // Add colorful background dots
        $colors = ['#f0dcdbff', '#ceebf5ff', '#daf1daff', '#c5c1adff', '#e7c5e7ff', '#b8b59bff', '#cab6afff'];

        for ($i = 0; $i < 80; $i++) {
            $color = $colors[array_rand($colors)];
            $x     = rand(0, $width);
            $y     = rand(0, $height);

            // Create small circles instead of single pixels
            $img->drawCircle($x, $y, function ($circle) use ($color) {
                $circle->radius(rand(1, 3));
                $circle->background($color);
            });
        }

        // Add some subtle gray dots for texture
        for ($i = 0; $i < 30; $i++) {
            $img->drawPixel(rand(0, $width), rand(0, $height), '#e0e0e0');
        }

        // Add some very light noise lines
        for ($i = 0; $i < 3; $i++) {
            $img->drawLine(function ($line) use ($width, $height) {
                $line->from(rand(0, $width), rand(0, $height))
                    ->to(rand(0, $width), rand(0, $height))
                    ->color('#eeeeee');
            });
        }

        // Add each digit with spacing like in your image
        $start_x = 20;
        $spacing = 35;

        for ($i = 0; $i < strlen($captcha_text); $i++) {
            $char = $captcha_text[$i];
            $x    = $start_x + ($i * $spacing);

            // Add slight random offset for each character
            $offset_x = rand(-3, 3);
            $offset_y = rand(-2, 2);

            $img->text($char, $x + $offset_x, 35 + $offset_y, function ($font) {
                $font->filename(public_path('front/font/Roboto-Black.ttf'));
                $font->size(28);
                $font->color('#666666'); // Dark gray text
                $font->align('center');
                $font->valign('center');
            });
        }
        return $img->toPng();
    }

    public function verifyCaptcha(Request $request)
    {
        $userInput   = $request->input('custom_captcha'); // value from input
        $captchaCode = session('captcha_code');           // value stored in session

        if ($userInput === $captchaCode) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Captcha incorrect']);
        }
    }

    public function Thankyou()
    {
        $metatitle       = "";
        $metadescription = "";

        return view('front.thank-you', compact('metatitle', 'metadescription'));
    }

    // public function storeContactForm(Request $request)
    // {

    //     $contact = Contact::create([
    //         'first_name' => $request->input('fullname'),
    //         'company_name' => $request->input('company_name'),
    //         'email' => $request->input('email'),
    //         'contact' => $request->input('contact_number'),
    //         'message' => $request->input('message'),
    //     ]);
    //     // Redirect to contact route with success message
    //     // try {
    //     //     Mail::to($request->email)->send(new SendContactMailToUser());
    //     //     // Send email to the admin with CC
    //     //     Mail::to('webdeveloper12.intelliworkz@gmail.com')->send(new SendContactMailToAdmin($contact));
    //     //     return redirect()->route('front.thank-you')->with('success', 'Your message has been sent successfully.');
    //     // }catch (\Exception $e) {
    //     //     Log::error('Email sending failed: ' . $e->getMessage());
    //     //     return back()->with('error', 'Failed to send the email. Please try again later.');
    //     // }
    //         return redirect()->route('front.thank-you')->with('success', 'Your message has been sent successfully.');

    // }

    public function storeContactForm(Request $request)
    {
        $request->validate([
            'fullname'       => [
                'required',
                'string',
                'max:100',
                // Block URLs
                function ($attribute, $value, $fail) {
                    if (preg_match('/https?:\/\/|www\./i', $value)) {
                        $fail('Links are not allowed.');
                    }
                },
                // Spam keywords
                function ($attribute, $value, $fail) {
                    $spamWords = ['seo', 'crypto', 'viagra', 'casino', 'furniture', 'wholesale', 'упаковка', 'оборудование'];

                    foreach ($spamWords as $word) {
                        if (str_contains(strtolower($value), $word)) {
                            $fail('Spam content detected.');
                            break;
                        }
                    }
                },
            ],
            'email'          => [
                'required',
                'email:rfc,dns',
                'max:255',
                function ($attribute, $value, $fail) {
                    $domain         = explode('@', $value)[1] ?? '';
                    $blockedDomains = [
                        'mail.ru',
                        'yopmail.com',
                        'tempmail.com',
                        '10minutemail.com',
                        'guerrillamail.com',
                        'throwawaymail.com',
                        'mailinator.com',
                    ];

                    if (in_array(strtolower($domain), $blockedDomains)) {
                        $fail('Disposable email addresses are not allowed.');
                    }
                },
            ],
            'contact_number' => [
                'required',
                'numeric',
                'digits_between:10,15',
            ],
            'company_name'   => [
                'required',
                'string',
                'max:255',
            ],
            'message'        => [
                'nullable',
                'string',
                'max:500',
                // Block URLs
                function ($attribute, $value, $fail) {
                    if (preg_match('/https?:\/\/|www\./i', $value)) {
                        $fail('Links are not allowed in message.');
                    }
                },
                // Spam keyword + density check
                function ($attribute, $value, $fail) {
                    $spamWords = ['seo', 'crypto', 'viagra', 'casino', 'furniture', 'wholesale', 'упаковка', 'оборудование'];

                    $valueLower = strtolower($value);
                    $count      = 0;

                    foreach ($spamWords as $word) {
                        if (str_contains($valueLower, $word)) {
                            $count++;
                        }
                    }

                    if ($count >= 1) {
                        $fail('Spam content detected.');
                    }
                },

                // Too many links
                function ($attribute, $value, $fail) {
                    preg_match_all('/https?:\/\/|www\./i', $value, $matches);

                    if (count($matches[0]) > 1) {
                        $fail('Too many links are not allowed.');
                    }
                },
            ],
            // Bot timing check (hidden field form_time)
            'form_time'      => [
                'required',
                function ($attribute, $value, $fail) {
                    if ((time() - (int) $value) < 5) {
                        $fail('Form submitted too quickly.');
                    }
                },
            ],
        ]);

        // Honeypot check (detect bots)
        if (! empty($request->fax_number)) {
            \Log::warning('Honeypot triggered — possible spam entry', [
                'email' => $request->email,
                'name'  => $request->fullname,
            ]);

            // Don’t show an error to bots — just act like it succeeded
            return redirect()->route('front.thank-you');
        }

        $contact = Contact::create([
            'first_name'   => $request->input('fullname'),
            'company_name' => $request->input('company_name'),
            'services' => $request->input('services'),
            'email'        => $request->input('email'),
            'country'      => $request->input('country'),
            'phone_code'   => $request->input('phone_code'),
            'contact'      => $request->input('contact_number'),
            'message'      => $request->input('message'),
        ]);
        // Redirect to contact route with success message
        // try {
        //     Mail::to($request->email)->send(new SendContactMailToUser());
        //     // Send email to the admin with CC
        //     Mail::to('webdeveloper12.intelliworkz@gmail.com')->send(new SendContactMailToAdmin($contact));
        //     return redirect()->route('front.thank-you')->with('success', 'Your message has been sent successfully.');
        // }catch (\Exception $e) {
        //     Log::error('Email sending failed: ' . $e->getMessage());
        //     return back()->with('error', 'Failed to send the email. Please try again later.');
        // }

        $contact_number_withcode = "'" . $request->phone_code . ' ' . $request->contact_number;
        $sheetData               = [
            'form_type'    => 'Contact Form',
            'fullname'     => $request->fullname ?? '',
            'company_name' => $request->company_name ?? '',
            'services'     => $request->services ?? '',
            'country'      => $request->country ?? '',
            'contact'      => $contact_number_withcode ?? '',
            'email'        => $request->email ?? '',
            'service_name' => $request->input('services') ?? '',
            'message'      => $request->message ?? '',
            'date'         => now()->format('Y-m-d H:i:s'),
        ];
        $response = Http::timeout(30)
            ->withHeaders([
                'Content-Type' => 'application/json',
            ])
            ->post('https://script.google.com/macros/s/AKfycbzg5STqANh0nJkB5D-CGiHATkppIBPjgFyvXA-dkgA4nFZROQCsAQuZ90LIEv7VMVFa/exec', $sheetData);

        // Check response
        if ($response->successful()) {
            $responseData = $response->json();
            if (isset($responseData['status']) && $responseData['status'] === 'success') {
                Log::info('Data successfully sent to Google Sheets', [
                    'email'    => $request->email,
                    'response' => $responseData,
                ]);
                return redirect()->route('front.thank-you')->with('success', 'Your message has been sent successfully.');

            } else {
                Log::warning('Google Sheets API returned error', [
                    'response' => $responseData,
                    'email'    => $request->email,
                ]);
                return redirect()->route('front.thank-you')->with('success', 'Your message has been sent successfully.');

            }
        } else {
            Log::error('Google Sheets API request failed', [
                'status' => $response->status(),
                'body'   => $response->body(),
                'email'  => $request->email,
            ]);
            return redirect()->route('front.thank-you')->with('success', 'Your message has been sent successfully.');

        }
        // return redirect()->route('front.thank-you')->with('success', 'Your message has been sent successfully.');

    }

    public function storeCareerApplication(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name'     => ['required', 'string', 'min:3', 'max:255'],
            'email'         => ['required', 'email', 'max:255', 'unique:career_applications,email'],
            'mobile_number' => ['required'],
            'message'       => ['nullable', 'string', 'max:2000'],
            'resume'        => [
                'required',
                'file',
                'mimes:pdf,doc,docx',
                'max:2048', // 2 MB (KB based)
            ],
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $resumePath = null;
        if ($request->hasFile('resume')) {
            $filename   = 'Resume_' . time() . '_' . $request->file('resume')->getClientOriginalName();
            $resumePath = $request->file('resume')->storeAs('resumes', $filename, 'public');
        }

        $careerApplication = CareerApplication::create([
            'full_name'     => $request->input('full_name'),
            'email'         => $request->input('email'),
            'mobile_number' => $request->input('mobile_number'),
            'message'       => $request->input('message'),
            'resume'        => $resumePath,
        ]);
        // $data = [
        //     'full_name' => $request->full_name,
        //     'email' => $request->email,
        //     'mobile_number' => $request->mobile_number,
        //     'message_content' => $request->message
        // ];
        // Redirect to contact route with success message
        //try {
        // SEND MAIL TO CUSTOMER
        //Mail::send('front.email.career_application_user', $data, function ($message) use ($data) {
        // $message->to($data['email'])->subject('Career Application Submission');
        // });
        // SEND MAIL TO ADMIN
        // Mail::send('front.email.career_application_admin', $data, function ($message) use ($data, $resumePath) {
        //     $message->to('webdeveloper9.intelliworkz@gmail.com')->subject('New Career Application Submission');
        // });

        return redirect()->route('front.thank-you')->with('success', 'Your message has been sent successfully.');
        // }catch (\Exception $e) {
        //     Log::error('Email sending failed: ' . $e->getMessage());
        //     return back()->with('error', 'Failed to send the email. Please try again later.');
        // }
    }

    public function checkApplicationEmail(Request $request)
    {
        $email  = $request->input('email');
        $exists = CareerApplication::where('email', $email)->exists();

        return response()->json(['unique' => ! $exists]);
    }

    public function projects()
    {
        $title        = "Explore Our 3D Printing Projects | ARC 3D";
        $description  = "Explore our 3D printing projects, such as Architectural Scale Models, Cartoons, Decorative, Defence, Oil Gas, Prototypes, Engines, and many more";
        $our_services = Services::where('status', 'Active')->orderBy('index_id', 'Asc')->get();
        // $projects = FeatureProject::where('status' , 'Active')->orderBy('id' , 'Desc')->get();
        $projects = FeatureProject::where('status', 'Active')
            ->orderByRaw("
                CASE
                    WHEN JSON_CONTAINS(services, '\"architectural-scale-models\"') THEN 0
                    ELSE 1
                END
            ")
            ->orderBy('id', 'DESC')
            ->get();
        return view('front.projects', compact('title', 'description', 'our_services', 'projects'));
    }
    public function architecture()
    {
        $title       = "";
        $description = "";
        return view('front.architecture', compact('title', 'description'));
    }
    public function prototyping()
    {
        $title       = "";
        $description = "";
        return view('front.prototyping', compact('title', 'description'));
    }
    public function large_scale()
    {
        $title       = "";
        $description = "";
        return view('front.large_scale', compact('title', 'description'));
    }
    public function terms()
    {
        $title       = "ARC3D Terms & Conditions | User Guidelines & Legal Info";
        $description = "Read ARC3D’s Terms and Conditions to understand the rules, guidelines, and legal agreements for using our 3D design and visualization services in the UAE.";
        return view('front.terms', compact('title', 'description'));
    }
    public function privacy()
    {
        $title       = "ARC3D Privacy Policy | How We Protect Your Data";
        $description = "Discover how ARC3D collects, uses, and protects your personal data. Read our Privacy Policy to understand your rights and our commitment to privacy in the UAE.
";
        return view('front.privacy', compact('title', 'description'));
    }
    public function blog_listing()
    {

        $title       = "ARC 3D: 3D Printing Insights, Trends & News in UAE";
        $description = "ARC 3D delivers expert 3D printing insights, trends & news in UAE, covering 3D modeling, scanning, and prototyping for architects, designers & industries.";

        $blogs = Blogs::where('status', 'Active')->orderBy('date', 'desc')->get();
        return view('front.blog_listing', compact('title', 'description', 'blogs'));
    }
    public function blog_detail($url)
    {
        $blogs       = Blogs::/*where('status' , 'Active')->*/where('url', $url)->first();
        $title       = $blogs->meta_title ?? '';
        $description = $blogs->meta_description ?? '';
        return view('front.blog_detail', compact('title', 'description', 'blogs'));
    }

    public function Services($url)
    {
        // 🚫 Redirect condition
        if ($url == '3d-printing') {
            return redirect()->route('front.printing');
        }

        // 🚫 List of services NOT allowed to show on frontend
        $exclude = [
            'scale-models',
            'architectural-scale-models',
            'trophies-and-giveaways',
            'props-and-sculptures',
            'prototype-and-low-volume-parts',
            '3d-scanning-and-reverse-engineering',

        ];

        // 👉 If URL belongs to an excluded service → show 404
        if (in_array($url, $exclude)) {
            return abort(404);
        }

        // 👉 Load the service normally
        $service = Services::where('url', $url)->first();
        if (! $service) {
            return abort(404);
        }

        $title       = $service->meta_title ?? '';
        $description = $service->meta_description ?? '';

        // 👉 How it works
        $howitworkarray = [];
        if ($service->howitworks) {
            $howitworkarray = json_decode($service->howitworks, true);
        }
        $howitsworks = null;
        if (isset($howitworkarray) && is_countable($howitworkarray) && count($howitworkarray) > 0) {
            $howitsworks = HowItWorks::where('status', 'Active')->whereIn('id', $howitworkarray)->get();
        }

        // 👉 Exceeds expectations
        $excedsarray = [];
        if ($service->exceeds_expectations) {
            $excedsarray = json_decode($service->exceeds_expectations, true);
        }
        $exceeds_expectations = null;
        if (isset($excedsarray) && is_countable($excedsarray) && count($excedsarray) > 0) {
            $exceeds_expectations = ExceedsExpectations::where('status', 'Active')->whereIn('id', $excedsarray)->get();
        }

        // 👉 Feature projects
        $feature_projects = FeatureProject::where('status', 'Active')
            ->whereJsonContains('services', $service->url)
            ->get();

        return view('front.services-details', compact(
            'feature_projects',
            'title',
            'description',
            'service',
            'howitsworks',
            'exceeds_expectations'
        ));
    }

    public function printing()
    {
        $url     = '3d-printing';
        $service = Services::where('url', $url)->first();
        if (! $service) {
            return abort(404);
        }
        $title        = $service->meta_title ?? '';
        $description  = $service->meta_description ?? '';
        $technologies = Technologies::where('status', 'Active')->orderBy('id', 'Desc')->get();
        $printings    = Printing::where('status', 'Active')->get();

        return view('front.printing', compact('title', 'description', 'technologies', 'service', 'printings'));
    }

    public function architectureModel()
    {
        $url     = 'architectural-model-making';
        $service = Services::where('url', $url)->first();
        if (! $service) {
            return abort(404);
        }
        $title       = $service->meta_title ?? '';
        $description = $service->meta_description ?? '';

        $howitworkarray = [];
        if ($service->howitworks) {
            $howitworkarray = json_decode($service->howitworks, true);
        }
        $howitsworks = HowItWorks::where('status', 'Active')->whereIn('id', $howitworkarray)->get();

        $excedsarray = [];
        if ($service->exceeds_expectations) {
            $excedsarray = json_decode($service->exceeds_expectations, true);
        }
        $exceeds_expectations = ExceedsExpectations::where('status', 'Active')->whereIn('id', $excedsarray)->get();

        $our_services = Services::where('status', 'Active')->orderBy('id', 'Desc')->get();
        $industries   = Industries::where('status', 'Active')->orderBy('id', 'asc')->get();

        return view('front.architecture-model', compact('title', 'description', 'service', 'howitsworks', 'industries',
            'exceeds_expectations', 'our_services'));
    }
    // store inquires form
    // public function StoreInquires(Request $request)
    // {
    //     $service_inquiry = ServiceInquires::create([
    //         'fullname' => $request->input('fullname'),
    //         'company_name' => $request->input('company_name'),
    //         'service_name' => $request->input('service'),
    //         'contact' => $request->input('phone'),
    //         'email' => $request->input('email'),
    //         'message' => $request->input('message'),
    //     ]);
    //     // Redirect to contact route with success message
    //     // try {
    //     //     Mail::to($request->email)->send(new SendServiceInquiresMailToUser());
    //     //     // Send email to the admin with CC
    //     //     Mail::to('webdeveloper12.intelliworkz@gmail.com')->send(new SendServiceInquiresMailToAdmin($service_inquiry));
    //     //     return redirect()->route('front.thank-you')->with('success', 'Your message has been sent successfully.');
    //     // }catch (\Exception $e) {
    //     //     Log::error('Email sending failed: ' . $e->getMessage());
    //     //     return back()->with('error', 'Failed to send the email. Please try again later.');
    //     // }
    //         return redirect()->route('front.thank-you')->with('success', 'Your message has been sent successfully.');

    // }

    public function StoreInquires(Request $request)
    {
        try {
            $request->validate([
                'fullname'       => ['required', 'regex:/^[A-Za-z\s]+$/'],
                'company_name'   => ['required', 'regex:/^[A-Za-z0-9\s]+$/'],
                'phone'          => ['required', 'digits_between:7,15'],
                'email'          => ['required', 'email'],
                'serviceName'    => ['required', 'string', 'max:100', 'exists:services,title,deleted_at,NULL'],
                'custom_captcha' => ['required'],
            ]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

        // Honeypot check (detect bots)
        if (! empty($request->fax_number)) {
            \Log::warning('Honeypot triggered — possible spam entry', [
                'email' => $request->email,
                'name'  => $request->fullname,
            ]);

            // Don’t show an error to bots — just act like it succeeded
            return redirect()->route('front.thank-you');
        }
        $service_inquiry = ServiceInquires::create([
            'fullname'     => $request->input('fullname'),
            'company_name' => $request->input('company_name'),
            'service_name' => $request->input('serviceName'),
            'contact'      => $request->input('phone'),
            'email'        => $request->input('email'),
            'message'      => $request->input('message'),
        ]);
        $sheetData = [
            'form_type'    => 'Service Form',
            'fullname'     => $request->fullname ?? '',
            'company_name' => $request->company_name ?? '',
            'country'      => $request->country ?? '',
            'contact'      => $request->phone ?? '',
            'email'        => $request->email ?? '',
            'service_name' => $request->input('serviceName') ?? '',
            'message'      => $request->message ?? '',
            'date'         => now()->format('Y-m-d H:i:s'),
        ];
        // Redirect to contact route with success message
        // try {
        //     Mail::to($request->email)->send(new SendServiceInquiresMailToUser());
        //     // Send email to the admin with CC
        //     Mail::to('webdeveloper12.intelliworkz@gmail.com')->send(new SendServiceInquiresMailToAdmin($service_inquiry));
        //     return redirect()->route('front.thank-you')->with('success', 'Your message has been sent successfully.');
        // }catch (\Exception $e) {
        //     Log::error('Email sending failed: ' . $e->getMessage());
        //     return back()->with('error', 'Failed to send the email. Please try again later.');
        // }
        // return redirect()->route('front.thank-you')->with('success', 'Your message has been sent successfully.');
        $response = Http::timeout(30)
            ->withHeaders([
                'Content-Type' => 'application/json',
            ])
            ->post('https://script.google.com/macros/s/AKfycbzg5STqANh0nJkB5D-CGiHATkppIBPjgFyvXA-dkgA4nFZROQCsAQuZ90LIEv7VMVFa/exec', $sheetData);

        // Check response
        if ($response->successful()) {
            $responseData = $response->json();
            if (isset($responseData['status']) && $responseData['status'] === 'success') {
                Log::info('Data successfully sent to Google Sheets', [
                    'email'    => $request->email,
                    'response' => $responseData,
                ]);
                return redirect()->route('front.thank-you')->with('success', 'Your message has been sent successfully.');

            } else {
                Log::warning('Google Sheets API returned error', [
                    'response' => $responseData,
                    'email'    => $request->email,
                ]);
                return redirect()->route('front.thank-you')->with('success', 'Your message has been sent successfully.');

            }
        } else {
            Log::error('Google Sheets API request failed', [
                'status' => $response->status(),
                'body'   => $response->body(),
                'email'  => $request->email,
            ]);
            return redirect()->route('front.thank-you')->with('success', 'Your message has been sent successfully.');

        }

    }

    public function whatsaapinquiry(Request $request)
    {
        $validated = $request->validate([
            'number'  => 'required',
            'message' => [
                'nullable', 'string', 'max:500',

                function ($attribute, $value, $fail) {
                    if (! $value) {
                        return;
                    }

                    if (preg_match('/https?:\/\/|www\./i', $value)) {
                        $fail('Links are not allowed in message.');
                    }

                    if (preg_match('/[\x{0400}-\x{04FF}]/u', $value)) {
                        $fail('Invalid characters detected.');
                    }

                    $spamWords = ['seo', 'crypto', 'viagra', 'casino', 'furniture', 'wholesale'];
                    $count     = 0;

                    foreach ($spamWords as $word) {
                        if (stripos($value, $word) !== false) {
                            $count++;
                        }
                    }

                    if ($count >= 2) {
                        $fail('Spam content detected.');
                    }

                    preg_match_all('/https?:\/\/|www\./i', $value, $matches);
                    if (count($matches[0]) > 1) {
                        $fail('Too many links not allowed.');
                    }
                },
            ],
        ]);

        if (! empty($request->website_honey_point)) {
            return back();
        }

        WhatsappInquiry::create([
            'number'  => $request->number,
            'message' => $request->message,
        ]);

        $timestamp  = Carbon::now('Asia/Dubai')->format('Y-m-d H:i:s');
        $sheetsData = [
            'form_type' => 'whatsapp inquiry',
            'contact'   => $request->number,
            'message'   => $request->message,
            'date'      => $timestamp,
        ];

        // try {
        //     Http::withHeaders(['Content-Type' => 'application/json'])
        //         ->post('https://script.google.com/macros/s/AKfycbztAqlbzzo4_VTupFcT6udaQtinGuXjwL1zNm018BvHnkzEfLDF7JEa5DDjB2qKvWM-/exec', $sheetsData);
        // } catch (\Exception $e) {
        //     \Log::error('Google Sheets Exception (WhatsApp Inquiry):', [
        //         'message'   => $e->getMessage(),
        //         'trace'     => $e->getTraceAsString(),
        //         'data_sent' => $sheetsData,
        //     ]);
        // }



        try {
    $response = Http::withHeaders(['Content-Type' => 'application/json'])
        ->timeout(30)
        ->retry(3, 1000) // 3 attempts, 1 second gap
        ->post('https://script.google.com/macros/s/AKfycbztAqlbzzo4_VTupFcT6udaQtinGuXjwL1zNm018BvHnkzEfLDF7JEa5DDjB2qKvWM-/exec', $sheetsData);

    if ($response->successful()) {
        Log::info('WhatsApp inquiry sent to sheet', [
            'body' => $response->body(),
            'status' => $response->status(),
        ]);
    } else {
        Log::error('WhatsApp inquiry sheet failed', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);
    }
} catch (\Exception $e) {
    \Log::error('Google Sheets Exception (WhatsApp Inquiry):', [
        'message' => $e->getMessage(),
        'data_sent' => $sheetsData,
    ]);
}

        return response()->json(['success' => true]);
    }

    public function sitemap()
    {
        $urls = collect();

        // Static pages
        $staticPages = [
            ['loc' => url('/'), 'priority' => '1.00'],
            ['loc' => url('/our-projects'), 'priority' => '0.80'],
            ['loc' => url('/blogs'), 'priority' => '0.80'],
            ['loc' => url('/story'), 'priority' => '0.80'],
            ['loc' => url('/our-team'), 'priority' => '0.80'],
            ['loc' => url('/our-process'), 'priority' => '0.80'],
            ['loc' => url('/printing'), 'priority' => '0.80'],
            ['loc' => url('/career'), 'priority' => '0.80'],
            ['loc' => url('/contact'), 'priority' => '0.80'],
            ['loc' => url('/terms-and-conditions'), 'priority' => '0.50'],
            ['loc' => url('/privacy-policy'), 'priority' => '0.50'],
        ];

        foreach ($staticPages as $page) {
            $urls->push([
                'loc'      => $page['loc'],
                'lastmod'  => now()->toAtomString(),
                'priority' => $page['priority'],
            ]);
        }

        // Dynamic: Services (root-level URL, per your catch-all route)
        \App\Models\Services::where('status', 'Active')->get()->each(function ($service) use ($urls) {
            $urls->push([
                'loc'      => url('/' . $service->url),
                'lastmod'  => optional($service->updated_at)->toAtomString() ?? now()->toAtomString(),
                'priority' => '0.80',
            ]);
        });

        // Dynamic: Blogs
        \App\Models\Blogs::where('status', 'Active')->get()->each(function ($blog) use ($urls) {
            $urls->push([
                'loc'      => url('/blog-detail/' . $blog->url),
                'lastmod'  => optional($blog->updated_at)->toAtomString() ?? now()->toAtomString(),
                'priority' => '0.64',
            ]);
        });

        return response()
            ->view('front.sitemap', ['urls' => $urls])
            ->header('Content-Type', 'text/xml');
    }

    // public function whatsaapinquiry(Request $request)
    // {
    //     if (!empty($request->website_honey_point)) {
    //         return back(); // silently ignore
    //     }

    //     WhatsappInquiry::create([

    //         'number'  => $request->number,
    //         'message'  => $request->message,
    //     ]);

    //     $timestamp = Carbon::now('Asia/Dubai')->format('Y-m-d H:i:s');

    //     // Google Sheet expects:
    //     // form_type, contact, message, date
    //     $sheetsData = [
    //         'form_type' => 'whatsapp inquiry',
    //         'contact'   => $request->number,
    //         'message'  => $request->message,
    //         'date'      => $timestamp,
    //     ];
    //     try {
    //         Http::withHeaders(['Content-Type' => 'application/json'])
    //             ->post('https://script.google.com/macros/s/AKfycbztAqlbzzo4_VTupFcT6udaQtinGuXjwL1zNm018BvHnkzEfLDF7JEa5DDjB2qKvWM-/exec',
    //                 $sheetsData
    //             );
    //     } catch (\Exception $e) {
    //         \Log::error('Google Sheets Exception (WhatsApp Inquiry):', [
    //             'message'   => $e->getMessage(),
    //             'trace'     => $e->getTraceAsString(),
    //             'data_sent' => $sheetsData
    //         ]);
    //     }

    //     $number = '971542797571'; // Change if needed
    //     $message = 'Inquiry from the website.';
    //     $whatsappUrl = "https://api.whatsapp.com/send/?phone={$number}&text=" . urlencode($message);

    //     return back()->with('whatsapp_url', $whatsappUrl);
    // }

}
