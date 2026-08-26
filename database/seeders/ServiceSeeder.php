<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [

            // ── 01 ────────────────────────────────────────────────────────
            [
                'title'             => 'Strategic Communications',
                'short_description' => 'A full-picture communications framework that aligns your business objectives with the right messages, the right audiences and the right moments.',
                'meta_title'        => 'Strategic Communications Consultant in Bangalore | Payal Dasgupta',
                'meta_description'  => 'Senior strategic communications consultant in Bangalore. Narrative architecture, audience mapping and communications frameworks built around your business objectives.',
                'full_description'  => '
<p>Communications without strategy is just content. Strategy without communication is silence. The best outcomes sit at the intersection of the two.</p>

<p>Strategic communications begins before any press release is written or spokesperson prepped. It begins with a clear understanding of what the business is trying to achieve — and then works backwards to identify what needs to be said, to whom, through which channel and at what point in time.</p>

<h2>What this looks like in practice</h2>

<p>Across 12 years and multiple industries, the work has consistently involved three core questions:</p>

<ul>
    <li>What is the business trying to achieve in the next 12–18 months?</li>
    <li>Who are the audiences that can make or break that objective?</li>
    <li>What do those audiences currently believe, and what do we need them to believe?</li>
</ul>

<p>From those answers, a communications architecture is built — one that governs tone, timing, channel mix and narrative. It becomes the filter through which every communication decision is made.</p>

<h2>Who this is for</h2>

<p>Organisations at an inflection point. Companies entering a new market. Brands managing significant change. Leaders stepping into public-facing roles for the first time. Businesses that have grown quickly and whose communications have not kept pace with their ambition.</p>
',
                'faqs'              => [
                    ['question' => 'How is strategic communications different from general PR?', 'answer' => 'General PR tends to focus on output — placements, press releases, media coverage. Strategic communications focuses on outcome — what shifts in perception, behaviour or belief as a result of the communication effort. Strategy defines the destination; PR is one of the vehicles to get there.'],
                    ['question' => 'Do you work on a retainer or project basis?', 'answer' => 'Both, depending on the scope and the stage of the business. Ongoing strategic advisory typically works best on a retainer. Specific campaigns or audits are usually scoped as projects.'],
                    ['question' => 'How long does it take to see results?', 'answer' => 'Honest answer: it depends on the starting point. Reputation and narrative work is cumulative. Some outcomes — a specific piece of coverage, a media moment — can happen quickly. Sustained positioning shifts take 6–12 months of consistent effort.'],
                ],
                'cta_title'         => 'Build a communications framework that lasts.',
                'cta_description'   => 'Strategy before execution. Always.',
                'cta_link'          => '/contact',
                'sort_order'        => 1,
            ],

            // ── 02 ────────────────────────────────────────────────────────
            [
                'title'             => 'Public Relations',
                'short_description' => 'PR that is earned, not bought. Coverage that comes from having something genuinely worth saying — and saying it to the right people, at the right time.',
                'meta_title'        => 'Public Relations Agency in Bangalore | Payal Dasgupta',
                'meta_description'  => 'Specialist public relations services in Bangalore. Earned media coverage, narrative development and journalist relationships built on credibility, not volume.',
                'full_description'  => '
<p>Public relations, done well, is one of the most powerful tools a brand has. Done poorly, it is expensive noise.</p>

<p>The difference lies in starting with the story rather than the ask. Too many PR efforts begin with a list of journalists and a press release. The approach here starts earlier — with the business, the insight, the angle that will make a journalist stop and think: this is actually interesting.</p>

<h2>What is included</h2>

<ul>
    <li>Narrative and messaging development — what you stand for, how you say it</li>
    <li>Media strategy — which outlets, which journalists, which formats</li>
    <li>Press material creation — releases, backgrounders, briefing documents</li>
    <li>Media outreach and relationship management</li>
    <li>Coverage monitoring and results reporting</li>
    <li>Spokesperson preparation and media training</li>
</ul>

<h2>The industries I know</h2>

<p>Technology, healthcare, fintech, consumer brands, real estate, architecture, aerospace and AI — each with its own media landscape, its own set of gatekeepers and its own rules of credibility. Cross-industry pattern recognition is what makes the difference between a generic pitch and one that lands.</p>
',
                'faqs'              => [
                    ['question' => 'Can you guarantee coverage?', 'answer' => 'No ethical PR professional can guarantee coverage — and anyone who does should be questioned. What can be guaranteed is a rigorous approach: the right story, targeted to the right journalists, with persistent and professional follow-through. That combination produces results far more reliably than volume outreach.'],
                    ['question' => 'Do you handle crisis PR?', 'answer' => 'Yes, though it is worth noting that the best crisis communications work happens before any crisis occurs — in the form of preparation, protocols and scenario planning. When a crisis does arise, having a communicator already familiar with your business makes all the difference.'],
                    ['question' => 'What does a typical PR engagement look like?', 'answer' => 'It starts with a narrative audit and strategy session. From there, messaging is developed, a target media list is built and an outreach calendar is created. Monthly check-ins review what landed, what didn\'t and what needs adjusting.'],
                ],
                'cta_title'         => 'Ready for coverage that means something?',
                'cta_description'   => 'Start with the story. The placements follow.',
                'cta_link'          => '/contact',
                'sort_order'        => 2,
            ],

            // ── 03 ────────────────────────────────────────────────────────
            [
                'title'             => 'Brand Storytelling',
                'short_description' => 'Excavating the narrative that already exists inside your brand and giving it a shape that people can understand, remember and repeat.',
                'meta_title'        => 'Brand Storytelling Consultant in Bangalore | Payal Dasgupta',
                'meta_description'  => 'Brand storytelling and narrative strategy in Bangalore. Find and articulate the story your brand is already telling — and make it one worth remembering.',
                'full_description'  => '
<p>Every brand has a story worth telling. Most brands haven\'t found it yet — or haven\'t found the right way to tell it.</p>

<p>Brand storytelling is not about crafting fiction. It is about excavating what is genuinely true and differentiating about a business and translating that truth into a narrative that resonates with the people who matter most to it.</p>

<h2>The process</h2>

<p>It begins with listening. Conversations with founders, leaders, customers and sometimes critics. The goal is to understand not just what the brand does, but why it exists, what it believes and what kind of world it is trying to create — even if only in a small way.</p>

<p>From that listening comes a narrative framework: a core story, a set of supporting proof points and a vocabulary that is distinctly the brand\'s own. This is the foundation from which all communication — website copy, press materials, social voice, investor presentations — is built.</p>

<h2>What makes a story stick</h2>

<ul>
    <li><strong>Truth</strong> — audiences can sense authenticity and its absence</li>
    <li><strong>Tension</strong> — a story without a problem to solve is a statement, not a narrative</li>
    <li><strong>Specificity</strong> — the concrete detail that makes an abstract idea real</li>
    <li><strong>Consistency</strong> — the same story, told through every touchpoint, over time</li>
</ul>
',
                'faqs'              => [
                    ['question' => 'We already have a brand book. Do we still need this?', 'answer' => 'Brand books typically define visual identity, tone of voice and messaging guidelines. Brand storytelling goes deeper — it is about the narrative architecture that underpins those guidelines. Many businesses discover their brand book is describing how to communicate without articulating what to communicate about.'],
                    ['question' => 'How do you handle brands with complicated histories or inconsistent past messaging?', 'answer' => 'This is actually where the work gets most interesting. Complicated histories often contain the most compelling stories — they just need a considered edit. Inconsistent past messaging is addressed by building a clear and defensible narrative framework that everyone in the organisation can use going forward.'],
                    ['question' => 'What is the output?', 'answer' => 'A narrative document — often called a brand story or messaging architecture — that includes the core story, key messages for different audiences, a vocabulary guide and communication examples. This is a working document, not a presentation.'],
                ],
                'cta_title'         => 'Find the story inside your brand.',
                'cta_description'   => 'It is already there. Let\'s give it shape.',
                'cta_link'          => '/contact',
                'sort_order'        => 3,
            ],

            // ── 04 ────────────────────────────────────────────────────────
            [
                'title'             => 'Founder Positioning',
                'short_description' => 'Helping founders develop a distinct, credible public voice — one that builds their personal authority while reinforcing the credibility of their business.',
                'meta_title'        => 'Founder Positioning Consultant in Bangalore | Payal Dasgupta',
                'meta_description'  => 'Build a credible founder voice in Bangalore. Personal authority strategy for startup founders and business leaders — authentic, strategic, sustainable.',
                'full_description'  => '
<p>In early and growth-stage businesses, the founder is often the brand\'s most powerful communications asset. Investors, customers, partners and talent make decisions based not just on the product or service, but on the person behind it.</p>

<p>Founder positioning is the work of building a clear, consistent and credible public presence for a business leader — one that is authentically theirs, strategically purposeful and resilient enough to serve the business across multiple chapters of its growth.</p>

<h2>What this work involves</h2>

<ul>
    <li>Identifying the founder\'s genuine point of view — what they actually believe about their industry</li>
    <li>Distilling that into a clear positioning statement and core themes</li>
    <li>Building a content and visibility strategy across the right channels</li>
    <li>Preparing for media appearances, panels, keynotes and investor conversations</li>
    <li>Creating a sustainable voice that is consistent without being scripted</li>
</ul>

<h2>A note on authenticity</h2>

<p>The best founder positioning does not feel like positioning at all. It feels like a person with a clear perspective, sharing what they think. The strategy is in the structure; the delivery is always the founder\'s own voice. No ghostwriting that doesn\'t sound like the person. No manufactured opinions. Real perspective, well expressed.</p>
',
                'faqs'              => [
                    ['question' => 'I am not comfortable being in the spotlight. Can this still work for me?', 'answer' => 'Yes — and this is more common than you might expect among genuinely accomplished people. Founder positioning does not require a founder to be a natural extrovert or to perform on social media. It starts by finding the format and channel that suits how you actually think and communicate, then building outward from there.'],
                    ['question' => 'What is the difference between founder positioning and personal branding?', 'answer' => '"Personal branding" often implies a manufactured public persona. Founder positioning is about identifying and articulating what you genuinely believe — and making sure the world can see and understand it. The goal is credibility and trust, not follower counts.'],
                    ['question' => 'How does this connect to the company\'s communications?', 'answer' => 'Closely. The founder\'s voice and the company\'s narrative should reinforce each other — neither overshadowing nor contradicting the other. Part of this work is defining where the founder speaks as an individual and where they speak as a representative of the business.'],
                ],
                'cta_title'         => 'Build a public presence worth having.',
                'cta_description'   => 'Your perspective has value. Let\'s make it visible.',
                'cta_link'          => '/contact',
                'sort_order'        => 4,
            ],

            // ── 05 ────────────────────────────────────────────────────────
            [
                'title'             => 'Thought Leadership',
                'short_description' => 'Establishing genuine intellectual authority — not thought leadership as a content tactic, but as a sustained positioning strategy that builds trust over time.',
                'meta_title'        => 'Thought Leadership Strategy in Bangalore | Payal Dasgupta',
                'meta_description'  => 'Thought leadership consulting in Bangalore. Build sustained intellectual authority with a strategy built around genuine expertise, not content volume.',
                'full_description'  => '
<p>Thought leadership has become a buzzword. Used loosely, it describes any article, post or opinion that a business or executive publishes. Used properly, it describes something rarer: a point of view so consistently insightful, well-argued and genuinely useful that the market begins to associate a name with a perspective.</p>

<p>That kind of authority is not built by publishing more. It is built by publishing with intention — with a clear thesis, a specific audience in mind and a commitment to saying something that is actually worth the reader\'s time.</p>

<h2>What thought leadership strategy involves</h2>

<ul>
    <li>Defining your intellectual territory — the specific area where you can speak with genuine authority</li>
    <li>Developing a point of view that is distinct, defensible and interesting</li>
    <li>Identifying the platforms, publications and formats where your audience pays attention</li>
    <li>Building a content calendar that is strategic rather than reactive</li>
    <li>Measuring the right things — influence, perception shifts, inbound interest — not just engagement metrics</li>
</ul>

<h2>What thought leadership is not</h2>

<p>It is not writing about your own company\'s achievements. It is not recycling industry reports with a quote attached. It is not posting frequently in the hope that volume creates authority. The credibility gap between real thought leadership and performed thought leadership is immediately apparent to any discerning reader.</p>
',
                'faqs'              => [
                    ['question' => 'How do we identify the right topics to own?', 'answer' => 'By finding the intersection of three things: what you genuinely know better than most, what your target audience genuinely needs to understand and what the current conversation in your industry is missing. That overlap is your intellectual territory.'],
                    ['question' => 'What publications should we be targeting?', 'answer' => 'It depends entirely on who you are trying to reach. A B2B technology company has a different media landscape to a consumer healthcare brand. Part of this work is mapping the publications, platforms and formats that your specific audience actually reads and respects.'],
                    ['question' => 'How long until we see results?', 'answer' => 'Thought leadership is a long game. The first six months are about establishing a presence and building a body of work. Months six to eighteen are when the compounding begins — when the references, inbound enquiries and speaking invitations start to appear with regularity.'],
                ],
                'cta_title'         => 'Build authority that compounds.',
                'cta_description'   => 'Real thought leadership. Not content for its own sake.',
                'cta_link'          => '/contact',
                'sort_order'        => 5,
            ],

            // ── 06 ────────────────────────────────────────────────────────
            [
                'title'             => 'Media Relations',
                'short_description' => 'Building genuine relationships with journalists, editors and producers — and using those relationships to earn coverage that matters to your business.',
                'meta_title'        => 'Media Relations Services in Bangalore | Payal Dasgupta',
                'meta_description'  => 'Media relations and press outreach in Bangalore. Genuine journalist relationships, strategic pitching and coverage that serves your business objectives.',
                'full_description'  => '
<p>Media relations is the discipline most commonly associated with PR — and the one most commonly misunderstood. It is not about sending press releases to large lists of journalists and hoping something sticks. It is about understanding how journalists work, what they need and how to become a source they trust and return to.</p>

<h2>The media landscape has changed</h2>

<p>Newsrooms are smaller. Journalists cover more ground with fewer resources. The pitch that worked ten years ago is far less likely to work today. Relevance, timing, specificity and genuine news value are the only currencies that matter.</p>

<p>Good media relations starts long before a story needs to be told. It is built through consistent engagement, reliable information and an understanding that the journalist\'s job is to serve their readers — not to serve the brands they cover.</p>

<h2>What this involves</h2>

<ul>
    <li>Identifying the journalists, editors and publications that matter most to your business</li>
    <li>Developing a relationship-first engagement approach — not transactional, not one-way</li>
    <li>Creating media materials that respect journalists\' time and intelligence</li>
    <li>Pitching stories with genuine news value and clear angles</li>
    <li>Briefing and preparing spokespeople for interviews</li>
    <li>Managing the ongoing relationship, including difficult moments</li>
</ul>
',
                'faqs'              => [
                    ['question' => 'We have never had media coverage. Where do we start?', 'answer' => 'With the story. Before approaching any journalist, the narrative needs to be clear — what is genuinely interesting or useful about this business for a reader who has never heard of it? From there, a targeted list of relevant journalists is built and a relationship-first approach is taken, starting with trade and niche publications before moving to broader outlets.'],
                    ['question' => 'What should we do if a journalist asks a difficult question?', 'answer' => 'Answer it, ideally before the article is published. Declining to comment, saying "no comment" or being evasive tends to result in worse coverage than engaging honestly with difficult questions. Media training as part of spokesperson preparation covers exactly this territory.'],
                    ['question' => 'How do you measure the success of media relations?', 'answer' => 'Beyond coverage volume, the metrics that matter are reach (how many of your target audience saw it), sentiment (was it accurate, fair and positive?), tier of publication and whether the coverage achieved the underlying communications objective — introducing a new audience, correcting a misconception or establishing credibility in a new market.'],
                ],
                'cta_title'         => 'Coverage earned through relationships, not volume.',
                'cta_description'   => 'The right story, to the right journalist, at the right time.',
                'cta_link'          => '/contact',
                'sort_order'        => 6,
            ],

            // ── 07 ────────────────────────────────────────────────────────
            [
                'title'             => 'Brand Reputation',
                'short_description' => 'Building, protecting and, when necessary, restoring the perception of a brand — with honesty, consistency and a long-term view.',
                'meta_title'        => 'Brand Reputation Management in Bangalore | Payal Dasgupta',
                'meta_description'  => 'Brand reputation management in Bangalore. Build, protect and restore how your brand is perceived — through honest communication, not spin.',
                'full_description'  => '
<p>Reputation is one of the most valuable — and most fragile — assets a business owns. It is built slowly, over years of consistent action and communication. It can be damaged quickly, by a single incident handled poorly or a pattern of communication that erodes trust over time.</p>

<p>Reputation management is not about spin. It is about ensuring that what people believe about your brand accurately reflects who you are — and addressing the gap when it doesn\'t.</p>

<h2>The three dimensions of brand reputation</h2>

<ul>
    <li><strong>Building</strong> — establishing a positive, credible and consistent presence across the channels that matter to your audiences</li>
    <li><strong>Protecting</strong> — monitoring, anticipating and preparing for risks before they become crises</li>
    <li><strong>Restoring</strong> — when reputation has been damaged, a considered and honest communications response that focuses on action, not just words</li>
</ul>

<h2>What reputation management is not</h2>

<p>It is not suppressing negative information. It is not manufactured positivity. It is not a crisis communications tactic applied reactively when something has already gone wrong. The brands that come through reputational challenges most effectively are those that have invested in their credibility long before any challenge arrives.</p>
',
                'faqs'              => [
                    ['question' => 'We are dealing with negative coverage right now. Can you help?', 'answer' => 'Yes. The first step is an honest assessment of the situation — understanding what is being said, where, by whom and what the underlying issue is. From there, a response strategy is developed that is proportionate, honest and focused on the actions being taken rather than the words being used to describe them.'],
                    ['question' => 'How do you monitor brand reputation?', 'answer' => 'Through a combination of media monitoring tools, social listening, stakeholder feedback and periodic perception audits. The goal is to understand what audiences actually believe — not what the business hopes they believe.'],
                    ['question' => 'What role does internal communication play in brand reputation?', 'answer' => 'A significant one. What employees believe and say about a business has a direct impact on its external reputation. Internal communication is often the most overlooked dimension of reputation management — and one of the highest-leverage investments a business can make.'],
                ],
                'cta_title'         => 'Reputation built on substance.',
                'cta_description'   => 'Protect what you have built. Restore what needs rebuilding.',
                'cta_link'          => '/contact',
                'sort_order'        => 7,
            ],

            // ── 08 ────────────────────────────────────────────────────────
            [
                'title'             => 'Launch Communications',
                'short_description' => 'Creating the communications moment that gives a new product, business or initiative the attention and credibility it deserves — from the first announcement to sustained post-launch momentum.',
                'meta_title'        => 'Product Launch PR in Bangalore | Payal Dasgupta',
                'meta_description'  => 'Launch communications and product PR in Bangalore. From announcement strategy to post-launch momentum — make the launch window count.',
                'full_description'  => '
<p>A launch is a rare opportunity. For a brief window of time, the market is paying attention. The question is whether what it sees and hears is enough to convert that attention into belief, and belief into action.</p>

<p>Launch communications is about making the most of that window — with a story that is compelling, messaging that is clear, timing that is considered and a plan that anticipates both the best case and the unexpected.</p>

<h2>The stages of a launch</h2>

<p>Good launch communications begins months before the announcement date:</p>

<ul>
    <li><strong>Pre-launch</strong> — narrative development, messaging testing, media briefings under embargo, building anticipation among the right audiences</li>
    <li><strong>Launch day</strong> — coordinated announcement across channels, media outreach, social activation, internal communications</li>
    <li><strong>Post-launch</strong> — sustaining the story, building on initial coverage, converting awareness into deeper engagement</li>
</ul>

<h2>Common launch mistakes to avoid</h2>

<ul>
    <li>Announcing without a clear narrative — what this is and why it matters</li>
    <li>Prioritising volume over precision — reaching everyone rather than the right people</li>
    <li>No post-launch plan — treating the announcement as the end rather than the beginning</li>
    <li>Internal misalignment — employees finding out about the launch the same way the public does</li>
</ul>
',
                'faqs'              => [
                    ['question' => 'How far in advance should we start planning a launch?', 'answer' => 'For a significant product or business launch, ideally three to six months. This allows time to develop the narrative, prepare materials, brief key journalists under embargo, align internal teams and build the anticipation that makes a launch moment feel like an event rather than an announcement.'],
                    ['question' => 'We are a startup with limited budget. Can we still have an effective launch?', 'answer' => 'Absolutely. Some of the most effective launches have been driven by a genuinely compelling story and two or three precisely targeted media relationships — not large PR budgets. Precision is more valuable than scale for most early-stage businesses.'],
                    ['question' => 'What if our launch timing changes?', 'answer' => 'It always does. A good launch communications plan is built with contingencies — a modular approach that can adjust to shifting timelines without losing momentum or requiring everything to be rebuilt from scratch.'],
                ],
                'cta_title'         => 'Make the launch moment count.',
                'cta_description'   => 'One window. Let\'s not waste it.',
                'cta_link'          => '/contact',
                'sort_order'        => 8,
            ],

            // ── 09 ────────────────────────────────────────────────────────
            [
                'title'             => 'PR Strategy',
                'short_description' => 'A communications roadmap built around your business objectives — not a list of tactics in search of a purpose, but a coherent plan for building the perception your business needs.',
                'meta_title'        => 'PR Strategy Consultant in Bangalore | Payal Dasgupta',
                'meta_description'  => 'PR strategy consulting in Bangalore. A roadmap built from your business objectives — audience mapping, narrative, channel strategy and a clear measurement framework.',
                'full_description'  => '
<p>Most businesses do not have a PR strategy. They have a collection of PR activities — a press release here, a media outreach effort there — connected by the hope that visibility will follow. It sometimes does. More often, it does not.</p>

<p>A PR strategy begins with the business objective and works backwards. What does the business need the market to believe in the next 12 months? Which audiences hold those beliefs? What are the most credible and efficient paths to shifting them?</p>

<h2>What a PR strategy document contains</h2>

<ul>
    <li>Communications objective — derived from the business objective, not invented separately</li>
    <li>Audience map — who needs to know what, and why it matters to them</li>
    <li>Narrative and key messages — what is being said, and how it is being said</li>
    <li>Channel strategy — where the story will be told, and in what format</li>
    <li>Activation calendar — what happens, when, with what resource</li>
    <li>Measurement framework — how success will be defined and tracked</li>
</ul>

<h2>Strategy as a living document</h2>

<p>A PR strategy is not written once and filed. It is a working document — reviewed quarterly, adjusted in response to what is happening in the business and in the market, and used actively to guide every communication decision made by the team.</p>
',
                'faqs'              => [
                    ['question' => 'We already have an agency. Do we still need a PR strategy?', 'answer' => 'If your agency is producing results that map clearly to business objectives, possibly not. If you are producing a lot of activity without a clear sense of whether it is working — or what working would even look like — a strategy audit would be valuable, regardless of who is doing the execution.'],
                    ['question' => 'How is PR strategy different from marketing strategy?', 'answer' => 'Marketing strategy typically focuses on driving awareness, consideration and purchase. PR strategy focuses on building credibility, trust and narrative — the conditions under which marketing is more effective. The two should be closely aligned, but they are not the same discipline.'],
                    ['question' => 'Can you help us evaluate whether our current PR is working?', 'answer' => 'Yes. A communications audit — reviewing current activities, coverage, messaging consistency and alignment with business objectives — is often the starting point for strategic work. It identifies what is working, what is not and where the most significant opportunities lie.'],
                ],
                'cta_title'         => 'A plan, not just activity.',
                'cta_description'   => 'Build a PR strategy that your whole team can execute against.',
                'cta_link'          => '/contact',
                'sort_order'        => 9,
            ],

        ];

        foreach ($services as $data) {
            Service::create(array_merge($data, ['status' => 'active']));
        }

        $this->command->info('Seeded ' . count($services) . ' services.');
    }
}
