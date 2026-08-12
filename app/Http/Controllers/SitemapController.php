<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Services;

class SitemapController extends Controller
{
    // RETURN XML RESPONSE
    protected function xmlResponse(string $xml)
    {
        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    // COMPLETE SITEMAP - CONTAINS: HOMEPAGE, STATIC PAGES, BLOG POSTS AND SERVICES
    public function index()
    {
        $todayTime = "2026-08-12T15:30:00+05:30";
    
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // START - HOMEPAGE 

        $xml .= '<url>';

        $xml .= '<loc>'
            . htmlspecialchars(
                route('front.home'),
                ENT_XML1,
                'UTF-8'
            )
            . '</loc>';

        $xml .= '<lastmod>'
                . htmlspecialchars($todayTime, ENT_XML1, 'UTF-8')
                . '</lastmod>';

        $xml .= '<priority>1.00</priority>';

        $xml .= '</url>' . "\n";

        // END - HOMEPAGE

        // START - DYNAMIC SERVICES
        
        $excludeSlugs = config('global_values.exclude_service_slugs', []);

        $services = Services::where('status', 'Active')
            ->whereNull('deleted_at')
            ->whereNotIn('url', $excludeSlugs)
            ->get();

        foreach ($services as $service)
        {
            if (empty($service->url)) 
            {
                continue;
            }

            $loc = route('front.services', [
                'url' => $service->url
            ]);

            $lastmod = optional($service->updated_at)->toAtomString();

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars($lastmod, ENT_XML1, 'UTF-8')
                    . '</lastmod>';
            }

            $xml .= '<priority>0.80</priority>';

            $xml .= '</url>' . "\n";
        }

        // END - DYNAMIC SERVICES

        // START - STATIC PAGES

        $staticRoutes = [
            'front.story',
            'front.our_process',
            'front.our_team',
            'front.career',
            'front.contact',
            'front.projects',
            'front.blog_listing',
        ];

        foreach ($staticRoutes as $name)
        {
            $loc = route($name);

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            $xml .= '<lastmod>'
                . htmlspecialchars($todayTime, ENT_XML1, 'UTF-8')
                . '</lastmod>';

            $xml .= '<priority>0.60</priority>';

            $xml .= '</url>' . "\n";
        }

        // END - STATIC PAGES

        //  START - DYNAMIC BLOG POSTS

        $blogs = Blogs::where('status', 'Active')
            ->whereNull('deleted_at')
            ->get();

        foreach ($blogs as $blog)
        {
            if (empty($blog->url))
            {
                continue;
            }

            $loc = route('front.blog_detail', [
                'url' => $blog->url
            ]);

            $lastmod = optional($blog->updated_at)->toAtomString();

            $xml .= '<url>';

            $xml .= '<loc>'
                . htmlspecialchars($loc, ENT_XML1, 'UTF-8')
                . '</loc>';

            if ($lastmod)
            {
                $xml .= '<lastmod>'
                    . htmlspecialchars($lastmod, ENT_XML1, 'UTF-8')
                    . '</lastmod>';
            }

            $xml .= '<priority>0.60</priority>';

            $xml .= '</url>' . "\n";
        }

        //  END - DYNAMIC BLOG POSTS

        $xml .= '</urlset>';

        return $this->xmlResponse($xml);
    }
}