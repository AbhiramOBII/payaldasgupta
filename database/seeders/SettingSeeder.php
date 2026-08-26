<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            // Site identity
            'site_name'                => 'Payal Dasgupta',
            'site_tagline'             => 'Communications Strategist',

            // Contact details
            'contact_email'            => 'payal@payaldasgupta.com',
            'contact_phone'            => '+91 98765 43210',

            // Social links
            'linkedin_url'             => 'https://www.linkedin.com/in/payyal-daasgupta-782aa510b/',
            'twitter_url'              => '',
            'instagram_url'            => '',

            // Footer / SEO
            'footer_tagline'           => 'Building narratives that earn trust, drive credibility and create lasting impact.',
            'default_meta_description' => 'Senior Communications Strategist, PR Professional and Brand Storyteller based in Bangalore.',

            // Legal pages
            'privacy_policy' => '<h2>Privacy Policy</h2>
<p>Last updated: August 2026</p>
<p>This Privacy Policy explains how Payal Dasgupta ("we", "us", "our") collects, uses and protects information provided by visitors to payaldasgupta.com (the "Website").</p>

<h3>1. Information We Collect</h3>
<p>We collect information you voluntarily provide when you complete the contact form on our Website. This may include:</p>
<ul>
  <li>Your name</li>
  <li>Your email address</li>
  <li>Your phone number</li>
  <li>Your company or organisation name</li>
  <li>Your message or enquiry</li>
</ul>
<p>We do not collect information automatically beyond standard server logs (IP address, browser type, pages visited), which are retained for security purposes only.</p>

<h3>2. How We Use Your Information</h3>
<p>Information submitted through the contact form is used solely to:</p>
<ul>
  <li>Respond to your enquiry</li>
  <li>Assess whether our services are relevant to your requirements</li>
  <li>Follow up on any prior conversation you have initiated</li>
</ul>
<p>We do not sell, rent or share your personal information with third parties for marketing purposes.</p>

<h3>3. Cookies</h3>
<p>This Website uses only essential cookies necessary for basic functionality. We do not use tracking or advertising cookies without your consent. You may disable cookies in your browser settings, though this may affect certain features of the Website.</p>

<h3>4. Data Retention</h3>
<p>Enquiry data submitted through the contact form is retained for the period necessary to manage and follow up on business enquiries. You may request deletion of your data at any time by contacting us at the address below.</p>

<h3>5. Your Rights</h3>
<p>You have the right to request access to the personal data we hold about you, and to request its correction or deletion. To exercise these rights, please contact us at payal@payaldasgupta.com.</p>

<h3>6. Third-Party Links</h3>
<p>This Website may contain links to third-party websites. We are not responsible for the privacy practices or content of those websites and encourage you to review their privacy policies independently.</p>

<h3>7. Data Security</h3>
<p>We take reasonable technical measures to protect information submitted through the Website. No transmission over the internet is entirely secure and we cannot guarantee absolute security.</p>

<h3>8. Governing Law</h3>
<p>This Privacy Policy is governed by the laws of the Republic of India, including the Information Technology Act, 2000 and applicable rules. Any disputes arising from this Policy shall be subject to the exclusive jurisdiction of the courts of Bangalore, Karnataka.</p>

<h3>9. Changes to This Policy</h3>
<p>We may update this Privacy Policy from time to time. Any changes will be posted on this page with an updated "Last updated" date.</p>

<h3>10. Contact</h3>
<p>For any questions about this Privacy Policy, please write to us at <a href="mailto:payal@payaldasgupta.com">payal@payaldasgupta.com</a>.</p>',

            'terms_content' => '<h2>Terms of Use</h2>
<p>Last updated: August 2026</p>
<p>By accessing and using payaldasgupta.com (the "Website"), you agree to be bound by these Terms of Use. If you do not agree, please do not use this Website.</p>

<h3>1. Use of This Website</h3>
<p>This Website is provided for informational purposes. The content is intended to give visitors an understanding of the professional services offered by Payal Dasgupta. You agree to use the Website only for lawful purposes and in a manner that does not infringe the rights of others.</p>

<h3>2. Intellectual Property</h3>
<p>All content on this Website — including text, design, graphics, case studies and other materials — is the intellectual property of Payal Dasgupta and is protected under applicable Indian and international copyright law. You may not reproduce, distribute or create derivative works from any content on this Website without prior written permission.</p>

<h3>3. Professional Services</h3>
<p>This Website describes the scope of professional services offered but does not constitute a binding offer or guarantee of specific outcomes. All professional engagements are governed by separate written agreements entered into between Payal Dasgupta and the client.</p>

<h3>4. No Warranties</h3>
<p>This Website is provided "as is" without warranties of any kind, express or implied. We do not warrant that the Website will be uninterrupted, error-free or free of viruses. Information on this Website is provided in good faith and believed to be accurate at the time of publication, but we make no representations as to its completeness or ongoing accuracy.</p>

<h3>5. Limitation of Liability</h3>
<p>To the fullest extent permitted by applicable law, Payal Dasgupta shall not be liable for any direct, indirect, incidental or consequential loss or damage arising from your use of this Website or reliance on any content contained herein.</p>

<h3>6. External Links</h3>
<p>This Website may contain links to third-party websites for reference and convenience. We do not endorse or take responsibility for the content, accuracy or practices of any linked external sites.</p>

<h3>7. Governing Law</h3>
<p>These Terms of Use are governed by the laws of the Republic of India. Any disputes arising from use of this Website shall be subject to the exclusive jurisdiction of the courts of Bangalore, Karnataka.</p>

<h3>8. Changes to These Terms</h3>
<p>We reserve the right to update these Terms of Use at any time. Continued use of the Website following any changes constitutes acceptance of the revised terms. The date of the most recent update is shown at the top of this page.</p>

<h3>9. Contact</h3>
<p>For any questions regarding these Terms of Use, please write to us at <a href="mailto:payal@payaldasgupta.com">payal@payaldasgupta.com</a>.</p>',
        ];

        Setting::setMany($defaults);

        $this->command->info('Seeded ' . count($defaults) . ' settings.');
    }
}
