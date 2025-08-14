<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Social;
use App\Models\Client;
use App\Models\Testimonial;
use App\Models\Service;
use App\Models\Partner;

class SampleDataSeeder extends Seeder
{
    public function run(): void
    {
        // Add social media links
        Social::create([
            'name' => 'Facebook',
            'icon' => '<i class="fab fa-facebook"></i>',
            'link' => 'https://facebook.com/ihrachane'
        ]);
        
        Social::create([
            'name' => 'LinkedIn',
            'icon' => '<i class="fab fa-linkedin"></i>',
            'link' => 'https://linkedin.com/company/ihrachane'
        ]);
        
        Social::create([
            'name' => 'Instagram',
            'icon' => '<i class="fab fa-instagram"></i>',
            'link' => 'https://instagram.com/ihrachane'
        ]);

        // Add sample clients
        Client::create([
            'name' => 'Global Tech Solutions',
            'logo' => 'client1.jpg',
            'description' => 'Leading technology company'
        ]);
        
        Client::create([
            'name' => 'Fashion Forward',
            'logo' => 'client2.jpg',
            'description' => 'Premium fashion retailer'
        ]);

        // Add sample services
        Service::create([
            'title' => 'Product Research',
            'description' => 'Comprehensive market research and product sourcing',
            'icon' => 'fas fa-search'
        ]);
        
        Service::create([
            'title' => 'Quality Control',
            'description' => 'Rigorous quality assurance and inspection',
            'icon' => 'fas fa-check-circle'
        ]);
        
        Service::create([
            'title' => 'Logistics Management',
            'description' => 'End-to-end shipping and logistics solutions',
            'icon' => 'fas fa-truck'
        ]);

        // Add sample testimonials
        Testimonial::create([
            'name' => 'John Smith',
            'position' => 'CEO, Tech Innovations',
            'message' => 'Outstanding service! Ihrachane helped us streamline our supply chain and reduce costs significantly.',
            'rating' => 5
        ]);
        
        Testimonial::create([
            'name' => 'Sarah Johnson',
            'position' => 'Operations Manager, Fashion Hub',
            'message' => 'Professional team with excellent communication. They delivered exactly what we needed.',
            'rating' => 5
        ]);

        // Add sample partners
        Partner::create([
            'name' => 'Alibaba Group',
            'logo' => 'alibaba-logo.png',
            'website' => 'https://alibaba.com'
        ]);
        
        Partner::create([
            'name' => 'DHL Express',
            'logo' => 'dhl-logo.png',
            'website' => 'https://dhl.com'
        ]);
    }
}
