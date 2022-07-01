<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'data','coin','curr',
        'current_price','market_cap','total_volume',
    'facebook_likes','twitter_followers','reddit_average_posts_48h','reddit_average_comments_48h',
    'reddit_subscribers' ,'forks','stars','subscribers','total_issues','closed_issues',
    'pull_requests_merged','pull_request_contributors','alexa_rank',
    ];
}
