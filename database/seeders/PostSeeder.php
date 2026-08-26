<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [

            // ── 01 ────────────────────────────────────────────────────────
            [
                'title'        => 'Why Most PR Campaigns Fail Before They Begin',
                'excerpt'      => 'The most common reason a PR campaign underdelivers has nothing to do with the quality of the outreach or the journalists targeted. It has everything to do with what happens — or doesn\'t happen — before the first pitch is written.',
                'category'     => 'PR & Communications',
                'tags'         => ['PR', 'strategy', 'communications'],
                'published_at' => now()->subDays(6),
                'body'         => '
<p>Ask most people why a PR campaign failed and they will point to the usual suspects: the wrong media list, a press release no one read, a journalist who didn\'t reply. These are symptoms, not causes.</p>

<p>The real reason most PR campaigns underdeliver is that they begin at the wrong point. They begin with the tactic — the press release, the pitch, the event — rather than with the question the tactic is supposed to answer: <em>what does this audience need to believe, and what is the most credible way to help them believe it?</em></p>

<h2>The tactic-first trap</h2>

<p>The tactic-first trap is seductive because tactics feel like progress. A press release is something you can write. A media list is something you can build. An announcement date is something you can put in a calendar. Strategy, by contrast, is uncomfortable — it requires honest answers to questions that most organisations would rather skip past.</p>

<p>Questions like:</p>

<ul>
    <li>What is the business actually trying to achieve in the next twelve months?</li>
    <li>Who are the specific audiences whose beliefs, decisions or behaviours will determine whether that happens?</li>
    <li>What do those audiences currently believe — not what we wish they believed, but what they actually believe today?</li>
    <li>What change in belief are we trying to create, and why would our target audience find that change credible?</li>
</ul>

<p>Most organisations skip these questions and go straight to: what should we put in the press release?</p>

<h2>The narrative gap</h2>

<p>There is a concept I return to often in this work: the narrative gap. The narrative gap is the distance between what an organisation believes about itself and what its audiences actually believe about it.</p>

<p>Organisations with large narrative gaps tend to be the most frustrated by PR. They know what they want the world to think. They cannot understand why the world doesn\'t think it. The answer is almost always that they have been broadcasting rather than communicating — repeating their own self-perception rather than earning the audience\'s belief through evidence, context and consistency.</p>

<p>Closing the narrative gap is slow, unglamorous work. It requires a clear-eyed assessment of where you are starting from, not just where you want to end up. It requires communicating with the audience\'s frame of reference in mind, not your own. And it requires patience — the willingness to build credibility incrementally rather than expecting a single announcement to change everything.</p>

<h2>What good PR looks like before it starts</h2>

<p>The best PR campaigns I have seen share a common characteristic: they are almost boring to describe in advance. The story is clear. The audience is specific. The angle is genuinely interesting to someone who has never heard of the organisation. The spokespeople know what they want to say and why they are saying it.</p>

<p>The work, in other words, has already been done. The campaign is the last ten percent, not the first.</p>

<p>If your PR feels like it is perpetually underdelivering, the question is worth asking: where does your campaign actually begin?</p>
',
            ],

            // ── 02 ────────────────────────────────────────────────────────
            [
                'title'        => 'The Founder\'s Guide to Being Quotable',
                'excerpt'      => 'Journalists don\'t quote companies. They quote people. If you want your business to earn coverage, the founder needs to have something genuinely worth saying — and the conviction to say it clearly.',
                'category'     => 'Founder Perspective',
                'tags'         => ['founders', 'media', 'thought leadership', 'PR'],
                'published_at' => now()->subDays(18),
                'body'         => '
<p>One of the most common requests I hear from founders ahead of a media push goes something like this: "We need to get into [publication]. Can you help us write a press release?"</p>

<p>The question is not wrong, exactly. But it is coming from the wrong place. The conversation that needs to happen first is not about the press release. It is about whether the founder has something worth quoting.</p>

<h2>Why quotes matter</h2>

<p>In any story a journalist writes about your business, your voice matters. Not your company\'s voice — yours. The spokesperson who can offer a perspective that is specific, intelligent and slightly unexpected is the one who ends up in the story. The one who offers corporate language and approved messaging ends up on the cutting room floor.</p>

<p>Journalists are, at their core, looking for the same thing all good writers are looking for: something that makes the reader think, <em>huh, I hadn\'t considered it that way</em>. A quote that reframes the problem. An observation that reveals something true and underappreciated about the industry. A position that is defensible but not everyone would take.</p>

<h2>The three tests of a quotable perspective</h2>

<p>Before any media interaction, it is worth asking three questions about what you plan to say:</p>

<ul>
    <li><strong>Is it specific?</strong> "We believe in innovation" is not a perspective. "We think the industry is optimising for the wrong metric, and here\'s why" is.</li>
    <li><strong>Is it honest?</strong> The most quotable founders are the ones who say things other people in the industry are thinking but not saying. That takes a certain kind of courage — and it is also what earns trust.</li>
    <li><strong>Is it genuinely yours?</strong> A perspective you arrived at through experience reads completely differently to one constructed for the purpose of looking credible. Journalists can tell. So can readers.</li>
</ul>

<h2>Building the habit</h2>

<p>The founders I have seen develop the strongest media presence share one characteristic: they think out loud regularly. They write. They post. They talk about what they are observing in their industry — not just what their company is doing. They have developed a genuine point of view through the practice of articulating it, over and over, in different contexts.</p>

<p>By the time a journalist calls them, they are not scrambling for something to say. They already know what they think.</p>

<p>That is the goal. Not media training. Not message discipline. Just the habit of thinking clearly and saying it.</p>
',
            ],

            // ── 03 ────────────────────────────────────────────────────────
            [
                'title'        => 'What Makes a Story Travel',
                'excerpt'      => 'Some stories spread. Most don\'t. The difference rarely comes down to the budget behind them. It almost always comes down to the same handful of structural qualities — and they can be learned.',
                'category'     => 'Brand Strategy',
                'tags'         => ['storytelling', 'brand', 'narrative', 'communications'],
                'published_at' => now()->subDays(32),
                'body'         => '
<p>There is a pattern I have noticed in the stories that travel — the brand narratives that get shared, cited and repeated, the founder stories that end up in the places that matter, the pieces of content that quietly outlive everything else the organisation has produced.</p>

<p>It is not budget. It is not distribution. It is not even timing, though timing matters at the margins. The stories that travel share structural qualities that have almost nothing to do with resources and almost everything to do with craft.</p>

<h2>Tension</h2>

<p>A story without tension is a statement. "We help companies communicate better" is not a story. "Most companies are invisible not because they have nothing worth saying, but because they have never learned to say it" is a story — it contains a problem, an implication and a possibility.</p>

<p>The best brand stories are built around genuine tension: the gap between how things are and how they could be, the challenge the company was built to solve, the belief that puts the brand at odds with conventional wisdom. Without tension, there is no reason to keep reading.</p>

<h2>Specificity</h2>

<p>Abstraction is the enemy of memorability. "We work with companies across many industries" evaporates the moment you read it. "We have worked with a real estate developer, a healthtech founder and an aerospace brand — and the communication problem is always the same" is specific enough to hold in the mind.</p>

<p>The instinct in most brand communications is to go broad — to appeal to everyone by saying nothing that excludes anyone. The result is a message that appeals to no one, because it sounds like it was designed by committee and addressed to no one in particular.</p>

<p>Specificity does the opposite. It signals: I understand your world. I am talking to you.</p>

<h2>Consequence</h2>

<p>Every story that travels answers an implicit question: why does this matter? Not to the company — to the reader. The story has to connect to something the audience already cares about: a professional challenge, a widely held frustration, an aspiration they have quietly held for some time.</p>

<p>The test I use is simple: if I removed the brand name from this story, would a reader still care about it? If yes, the story has consequence of its own. If no, it is advertising dressed up as a story — and audiences can sense the difference at a hundred paces.</p>

<h2>Consistency</h2>

<p>The final quality is less about a single story and more about the body of work. Stories travel further when they are part of a consistent narrative — when the brand has a discernible point of view that persists across formats, channels and time.</p>

<p>The brands worth knowing are the ones you can summarise in a sentence. Not because they have simplified themselves, but because they have been consistent enough for a clear picture to form. That clarity is the result of years of saying the same true thing in different ways — and trusting that the accumulation will do the work that any single story cannot.</p>
',
            ],

            // ── 04 ────────────────────────────────────────────────────────
            [
                'title'        => 'The Quiet Power of a Consistent Narrative',
                'excerpt'      => 'The brands that last longest are rarely the loudest. They are the most consistent. There is a kind of compound interest in saying the same true thing over and over — and most organisations underestimate it.',
                'category'     => 'Brand Strategy',
                'tags'         => ['brand', 'narrative', 'consistency', 'reputation'],
                'published_at' => now()->subDays(47),
                'body'         => '
<p>We talk a lot about the power of a great story. We talk less about what makes that story last.</p>

<p>The answer, almost invariably, is consistency — the unsexy, patient, unglamorous work of saying the same true thing in different ways across different channels over a long period of time. It is less exciting than a campaign launch. It compounds in ways that campaigns rarely do.</p>

<h2>What consistency is not</h2>

<p>Consistency is not repetition. Repeating the same message verbatim across every channel, in every context, for years on end produces a different kind of failure — the failure of rigidity. Audiences tune it out. The message becomes wallpaper.</p>

<p>Consistency is the persistence of a point of view — the same underlying belief, expressed differently depending on the moment, the audience and the medium. The core stays fixed. Everything else is responsive to context.</p>

<p>Think of a writer you trust. The voice changes between a long essay and a short observation. The register changes between a serious piece and a lighter one. But something constant is always present — a way of thinking, a set of things they care about, a perspective that is recognisably theirs. That is consistency.</p>

<h2>The compound interest of narrative</h2>

<p>Here is what consistency produces over time, and why most organisations underestimate it.</p>

<p>In the early months, a consistent narrative builds familiarity. Audiences begin to recognise the brand\'s way of thinking. In the middle period, it builds credibility — the brand has now said the same things across enough different occasions that it begins to earn the status of someone with a genuine point of view, rather than someone saying what sounds good. In the long run, it builds something rarer: trust. The sense that this brand knows who it is, and has for a while.</p>

<p>Trust is not built by any single piece of communication, however brilliant. It is built by the accumulation of small, consistent signals across time. Most organisations are too impatient to let the accumulation happen. They change their narrative when results don\'t come fast enough. They rebrand when the story feels stale to them, not realising that it has only just begun to feel familiar to the audience.</p>

<h2>The hardest part</h2>

<p>The hardest part of maintaining a consistent narrative is living with the discomfort of saying the same thing again. After you have said it fifty times, it stops feeling true — or rather, it stops feeling interesting. You want to say something new.</p>

<p>The audience has only heard it twice.</p>

<p>The discipline is to keep saying the true thing until the audience owns it. Only then has the work been done. Only then can the story evolve, having earned the right to do so.</p>
',
            ],

            // ── 05 ────────────────────────────────────────────────────────
            [
                'title'        => 'Thought Leadership Is Not a Content Strategy',
                'excerpt'      => 'Publishing more has become the default response to the thought leadership brief. Volume and authority have almost nothing to do with each other. The confusion between them is expensive.',
                'category'     => 'Thought Leadership',
                'tags'         => ['thought leadership', 'content', 'authority', 'strategy'],
                'published_at' => now()->subDays(61),
                'body'         => '
<p>Somewhere along the way, thought leadership became a synonym for content. The thought leadership brief became the content brief. The thought leadership strategy became the publishing calendar. The thought leadership metric became the number of pieces produced.</p>

<p>This is a category error with real costs.</p>

<h2>What thought leadership actually requires</h2>

<p>Genuine intellectual authority — the kind that changes how an audience thinks about a subject — requires three things that a content strategy cannot supply.</p>

<p>First, it requires a genuine point of view. Not a position, which can be manufactured. A point of view — which emerges from experience, from the pattern of things you have observed over time, from the place where your expertise collides with a problem the world has not solved yet. It is not invented in a content planning workshop. It is excavated.</p>

<p>Second, it requires intellectual courage. The most influential pieces of thought leadership I have encountered make claims that a cautious communications team would have weakened before publishing. They say the uncomfortable true thing — about the industry, about conventional wisdom, about where things are actually heading. The instinct to sand down the edges is the enemy of authority.</p>

<p>Third, it requires patience. Authority compounds. The first piece you write barely registers. The tenth begins to accumulate weight. By the fiftieth, if the thinking has been consistent and the quality has been sustained, something interesting happens: people start attributing perspectives to you before you have expressed them. The point of view has left its mark.</p>

<h2>The publication question</h2>

<p>Most organisations approach thought leadership by asking: where should we publish? The right question is: what do we actually believe that is worth publishing?</p>

<p>The platform question is secondary and should be driven by audience, not aspiration. A long-form essay in a trade publication read by five thousand deeply relevant people is more valuable than a piece in a general publication read by five million people none of whom will ever buy from you.</p>

<p>Reach is not authority. Coverage is not credibility. Publishing more is not building a voice. The confusion between these things is where most thought leadership programmes lose the plot — and where the investment quietly stops delivering.</p>
',
            ],

            // ── 06 ────────────────────────────────────────────────────────
            [
                'title'        => 'Launch Day Is Too Late to Think About Your Story',
                'excerpt'      => 'The most avoidable communications failure I see in product and business launches is the one that happens months before launch day — when the story is still being treated as an afterthought.',
                'category'     => 'PR & Communications',
                'tags'         => ['launch', 'PR', 'brand story', 'communications strategy'],
                'published_at' => now()->subDays(79),
                'body'         => '
<p>I have been involved in enough launches to know where the avoidable ones go wrong. The brief arrives six to eight weeks before the launch date. The product is ready. The announcement is drafted. The media list is being compiled. Everyone is in execution mode.</p>

<p>And nobody has agreed on what the story actually is.</p>

<h2>Why story comes last (and why that\'s a problem)</h2>

<p>In most organisations, communications is treated as the final step in a process that has already been decided. The product team builds. The marketing team positions. The PR team announces. By the time anyone asks "what is the narrative?", the decisions that determine the narrative have already been made.</p>

<p>This is backwards.</p>

<p>The story is not a wrapper you put around a finished product. It is the logic that connects what you are launching to why anyone outside your organisation should care. It answers the question every journalist, investor and customer is implicitly asking when they encounter something new: <em>so what?</em></p>

<p>If you cannot answer "so what?" clearly, compellingly and consistently in the weeks before launch, a press release will not save you. The announcement will land with a thud, generate modest coverage and be forgotten by the following week.</p>

<h2>What good launch narrative work looks like</h2>

<p>The launches I have seen go well share a common characteristic: the communications team was in the room early. Not to polish the message, but to help shape it. To ask the inconvenient questions — who is this for, exactly? What changes for them because of this? Why is now the right moment? What is the claim we are willing to defend?</p>

<p>From those conversations, a narrative framework emerges. Not a positioning statement, which is a tool for consistency. A framework — a set of interconnected ideas that gives everyone on the launch team the same mental model of the story. The press release, the pitch, the website copy, the spokesperson talking points — all of these become easier to write, and more coherent when written, because they are drawing from the same source.</p>

<h2>The clock</h2>

<p>For a significant launch, this work needs to begin three to six months in advance. That is the lead time required to develop a narrative with the care it deserves, brief spokespeople properly, conduct embargoed media conversations that genuinely land and build the anticipation that turns an announcement into a moment.</p>

<p>Six weeks is not enough. Four weeks is a panic. Two weeks is damage control dressed as a launch plan.</p>

<p>Start earlier. Start with the story. The rest is execution.</p>
',
            ],

        ];

        foreach ($posts as $data) {
            Post::firstOrCreate(
                ['slug' => Str::slug($data['title'])],
                array_merge($data, ['status' => 'published'])
            );
        }

        $this->command->info('Seeded ' . count($posts) . ' posts.');
    }
}
