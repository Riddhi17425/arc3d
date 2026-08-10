<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Services;

class SitemapController extends Controller
{
    /**
     * Return XML response
     */
    protected function xmlResponse(string $xml)
    {
        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Sitemap Index
     */
    public function index()
    {
        $sitemaps = [
            route('sitemap.pages'),
            route('sitemap.posts'),
            route('sitemap.services'),
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($sitemaps as $loc) {
            $xml .= '<sitemap>';
            $xml .= '<loc>' . htmlspecialchars($loc, ENT_XML1, 'UTF-8') . '</loc>';
            $xml .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
            $xml .= '</sitemap>' . "\n";
        }

        $xml .= '</sitemapindex>';

        return $this->xmlResponse($xml);
    }

    /**
     * Static Pages Sitemap
     */
    public function pages()
    {
        $staticRoutes = [
            'front.home',
            'front.story',
            'front.our_process',
            'front.our_team',
            'front.architectural.model.making',
            'front.printing',
            'front.career',
            'front.contact',
            'front.projects',
            'front.architecture',
            'front.prototyping',
            'front.large_scale',
            'front.terms',
            'front.privacy',
            'front.blog_listing',
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($staticRoutes as $name) {

            $loc = route($name);

            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($loc, ENT_XML1, 'UTF-8') . '</loc>';
            $xml .= '</url>' . "\n";
        }

        $xml .= '</urlset>';

        return $this->xmlResponse($xml);
    }

    /**
     * Dynamic Blog Sitemap
     */
    public function posts()
    {
        $blogs = Blogs::where('status', 'Active')
            ->whereNull('deleted_at')
            ->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($blogs as $blog) {

            if (empty($blog->url)) {
                continue;
            }

            $loc = route('front.blog_detail', [
                'url' => $blog->url
            ]);

            $lastmod = optional($blog->updated_at)->toAtomString();

            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($loc, ENT_XML1, 'UTF-8') . '</loc>';

            if ($lastmod) {
                $xml .= '<lastmod>' . $lastmod . '</lastmod>';
            }

            $xml .= '</url>' . "\n";
        }

        $xml .= '</urlset>';

        return $this->xmlResponse($xml);
    }

    /**
     * Dynamic Service Sitemap
     */
    public function services()
    {
        $services = Services::where('status', 'Active')
            ->whereNull('deleted_at')
            ->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($services as $service) {

            if (empty($service->url)) {
                continue;
            }

            $loc = route('front.services', [
                'url' => $service->url
            ]);

            $lastmod = optional($service->updated_at)->toAtomString();

            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($loc, ENT_XML1, 'UTF-8') . '</loc>';

            if ($lastmod) {
                $xml .= '<lastmod>' . $lastmod . '</lastmod>';
            }

            $xml .= '</url>' . "\n";
        }

        $xml .= '</urlset>';

        return $this->xmlResponse($xml);
    }
}