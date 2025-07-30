<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GiftAssessmentController extends Controller
{
    private array $questions = [
        1 => 'I enjoy helping people grow in their understanding of the Bible.',
        2 => "I'm often the one others turn to when they need comfort, prayer, or spiritual advice.",
        3 => 'I enjoy organizing events, tasks, or church activities.',
        4 => 'I feel deep compassion for the poor, sick, or struggling and love to help.',
        5 => 'I feel energized when leading others and giving direction.',
        6 => "I enjoy giving financially to church or mission work-even when it stretches me.",
        7 => "I'm drawn to spend time in prayer, even for people I don't know well.",
        8 => "I love teaching or explaining God's Word in a clear way.",
        9 => "I'm quick to volunteer for background roles (cleaning, setup, tech, etc.)",
        10 => 'I enjoy sharing the gospel and telling others about Jesus.',
        11 => 'I have a strong desire to sing, play music, or lead worship.',
        12 => 'I feel confident making decisions when others are unsure.',
        13 => "I'm good at encouraging others, even when I'm going through difficulties.",
        14 => 'I often have insights or messages during prayer that turn out to be helpful or accurate.',
        15 => "I believe God sometimes gives me discernment about spiritual matters or people's intentions.",
    ];

    private array $categories = [
        'Teaching' => [1, 8],
        'Pastoral/Shepherding' => [2, 13],
        'Administration' => [3, 12],
        'Mercy/Helps' => [4, 9],
        'Leadership' => [5, 12],
        'Giving' => [6],
        'Intercession/Prayer' => [7],
        'Evangelism' => [10],
        'Worship/Music' => [11],
        'Prophecy/Discernment' => [14, 15],
    ];

    public function form()
    {
        return view('gift-assessment.form', ['questions' => $this->questions]);
    }

    public function submit(Request $request)
    {
        $data = $request->validate(
            array_combine(range(1, 15), array_fill(0, 15, 'required|integer|min:1|max:5'))
        );

        $scores = [];
        foreach ($this->categories as $name => $qNumbers) {
            $scores[$name] = array_sum(array_map(fn($q) => (int) $data[$q], $qNumbers));
        }

        arsort($scores);

        return view('gift-assessment.result', [
            'scores' => $scores,
        ]);
    }
}
