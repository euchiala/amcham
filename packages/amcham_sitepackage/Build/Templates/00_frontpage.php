<?php
require_once 'Inc/functions.php';

$current_page_name = '';
$bodyclass = '';

//------------------------------------------------------------------------------

include 'Globals/head.php';
include 'Partials/header.php';
//------------------------------ START CONTENT ---------------------------------
?>

<?php
ce('headers', [
    "headers" => [
        [
            'class' => '',
            'headline' => 'The voice of transatlantic business',
            'text' => 'We actively promote our members’ interests through our global network in business and politics. We stand for transparent dialogue, unrestricted trade and a competitive and open business climate.',
            'btn' =>'Euismod Magna',
            'image' => '../img/5.jpg',
        ],
    ],

]);
?>

<?php
ce('news-list', [
    'class' => '',
    'headline' => 'Latest updates',
    'items' => [
        [
            "tag" => "Committees",
            "subline" => "16 Nov 2021",
            "image" => "../img/AmCham-Germany-Female-Founders-Award_02.jpg",
            "title" => "''A revived transatlantic friendship is crucial to address key challenges worldwide''",
        ],
        [
            "tag" => "Committees",
            "image" => "../img/female-founders-team-1-1600x700-1.jpg",
            "subline" => "31 May 2021",
            "title" => "Joint Letter on Schrems II",
        ],
        [
            "tag" => "Berlin-Brandenburg",
            "subline" => "31 May 2021",
            "image" => "../img/16724320_303.jpg",
            "title" => "Female Founders Award 2021",
        ],
        [
            "tag" => "Committees",
            "subline" => "31 May 2021",
            "image" => "../img/1500-0-.jpg",
            "title" => "Joint Letter on Schrems II",
        ],
        [
            "tag" => "Committees",
            "subline" => "31 May 2021",
            "image" => "../img/work-5071593_960_720.jpg",
            "headline" => "Joint Letter on Schrems II",
        ],
        [
            "tag" => "Committees",
            "subline" => "31 May 2021",
            "image" => "",
            "title" => "Joint Letter on Schrems II",
        ],
        [
            "tag" => "Berlin-Brandenburg",
            "subline" => "31 May 2021",
            "image" => "",
            "title" => "Joint Letter on Schrems II",
        ],

    ],
]);
?>
<?php
ce('events-list', [
    'class' => '',
    'headline' => 'Upcoming Events',
    'items' => [
        [
            "day" => "20",
            "month" => "Sep",
            "date" => "20 May",
            "subline" => "Commitees",
            "image" => "../img/AmCham-Germany-Female-Founders-Award_02.jpg",
            "title" => "Transatlantic Talks with Ambassador Philipp T. Reeker",
        ],
        [
            "day" => "20",
            "month" => "May",
            "tag" => "vitual",
            "image" => "../img/female-founders-team-1-1600x700-1.jpg",
            "subline" => "Commitees",
            "title" => "Transatlantic Talks Kickoff Event",
        ],
        [
            "tag" => "",
            "day" => "20",
            "month" => "May",
            "subline" => "Commitees",
            "image" => "../img/16724320_303.jpg",
            "title" => "Wolfgang Tiefensee, Thüringer Wirtschaftsminister",
        ],
        [
            "day" => "15",
            "month" => "Sep",
            "tag" => "vitual",
            "subline" => "Commitees",
            "image" => "",
            "title" => "Insights Webinar",
        ],


    ],
]);
?>
<?php ce('members-list',[
    'class' => '',
    'headline' => 'New members',
    'items' => [
        [
            'class' => '',
            'image' => '../img/3m-4.svg',
            'ticket' => 'Patron',
        ],
        [

            'class' => '',
            'image' => '../img/Xerox_logo.svg',
            'ticket' => '',
        ],
        [

            'class' => '',
            'image' => 'Img/Logo/amcham-logo.svg',
            'ticket' => '',
        ],
        [

            'class' => '',
            'image' => '../img/Logo_Bayer.svg',
            'ticket' => '',
        ],
        [

            'class' => '',
            'image' => '../img/Bristol-Myers_Squibb_logo_(2020).svg',
            'ticket' => '',
        ],
        [

            'class' => '',
            'image' => '../img/Dow_Logo.svg',
            'ticket' => 'Executive',
        ],
        [

            'class' => '',
            'image' => '../img/Lapp_Logo_rgb.svg',
            'ticket' => '',
        ],
        [

            'class' => '',
            'image' => '../img/philip-morris-international-pmi-vector-logo.svg',
            'ticket' => '',
        ],
    ]
]); ?>

<?php
//----------------------------- END CONTENT ------------------------------------
include '12_prefooter.php';
include 'Globals/foot.php';
include 'Partials/footer.php';
//------------------------------------------------------------------------------