<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Str;

use App\Models\Coin;
use App\Models\Platform;
use App\Models\Exchange;
use App\Models\Index;
use App\Models\Derivative;
use App\Models\History;




class GetCoins extends Command
{
    const URL = 'https://api.coingecko.com/api/v3/';

    protected $signature = 'update:coins';


    protected $description = 'Update Coins';


    public function handle()
    {
        #$name = $this->ask('What is your name?');

        $this->exchange_rates();
        $this->get_asset_platform();
        $this->coins__categories();
        $this->exchanges();
        $this->indexes();
        $this->derivatives();
        $this->history();
/*
        $opt = $this->choice(
            'What is your name?',
            ['Taylor', 'Dayle'],
            #$defaultIndex,
            #$maxAttempts = null,
            $allowMultipleSelections = true
        );

        $this->info('The command was successful!');
        $this->error('Something went wrong!');
        $this->line('Display this on the screen');

        switch($opt){
            case "aaa":

                break;
            case "bbb":

                break;
            default:

        }
        
*/


        return 0;
    }

    public function exchange_rates(){
        $str = $this->get('exchange_rates');

        $coins = json_decode($str,true)['rates'];
        #var_dump();die;

        foreach($coins as $k=>$coin){
            #dump($coin);
            extract($coin);
            #echo "\n- $k--\n";

            $res = Coin::updateOrCreate(
                [
                    'slug'=>Str::slug($name),
                ], #fixo
                [
                    'unit'=>$unit,
                    'name'=>$name,
                    'type'=>$type,
                    'value'=>$value,
                ]#var
            );
            echo "\n$k";
            echo $res ? "OK":"ERR";
        }
        
    }

    public function get_asset_platform(){

        $str = $this->get('asset_platforms');

        $platforms = json_decode($str,true);
        foreach($platforms as $k=>$platform){
            echo "\n$k - ";
            extract($platform);
            if($id){
                $res = Category::updateOrCreate(
                    [
                        'slug'=>$id, #atencao aqui !!!! id e slug combinados
                    ], #fixo
                    [
                        'name'=>$name,
                        'shortname'=>$shortname,
                        'chain_identifier'=>$chain_identifier,
                       
                    ]#var
                );
                echo $res ? "OK":"ERR";
            } else {
                echo "ID null";
            }
    
        }
    }
   
   
    public function coins__categories(){

        $str = $this->get('coins/categories');

        $categorys = json_decode($str,true);
        foreach($categorys as $k=>$category){
            echo "\n$k - ";
            extract($category);
            if($id){
                $res = Category::updateOrCreate(
                    [
                        'slug'=>$id, #atencao aqui !!!! id e slug combinados
                    ], #fixo
                    [
                        'name'=>$name,
                        'market_cap'=>$market_cap,
                        'market_cap_change_24h'=>$market_cap_change_24h,
                        'content'=>$content,
                        'top_3_coins'=>(array) $top_3_coins,
                        'volume_24h'=>$volume_24h,
                        
                       
                    ]#var
                );
                echo $res ? "OK":"ERR";
            } else {
                echo "ID null";
            }
    
        }
    }
  

    public function exchanges(){

        $str = $this->get('exchanges');

        $exchanges = json_decode($str,true);
        foreach($exchanges as $k=>$exchange){
            echo "\n$k - ";
            extract($exchange);
            if($id){
                $res = Exchange::updateOrCreate(
                    [
                        'slug'=>$id, #atencao aqui !!!! id e slug combinados
                    ], #fixo
                    [
                        'name'=>$name,
                        'year_established'=>$year_established,
                        'country'=>$country,
                        'description'=>$description,
                        'url'=>$url,
                        'image'=>$image,
                        'has_trading_incentive'=>$has_trading_incentive,
                        'trust_score'=>$trust_score,
                        'trust_score_rank'=>$trust_score_rank,
                        'trade_volume_24h_btc'=>$trade_volume_24h_btc,
                        'trade_volume_24h_btc_normalized'=>$trade_volume_24h_btc_normalized,
                        
                       
                    ]#var
                );
                echo $res ? "OK":"ERR";
            } else {
                echo "ID null";
            }
    
        }
    }
  

    public function indexes(){

        $str = $this->get('indexes');

        $indexes = json_decode($str,true);
        foreach($indexes as $k=>$index){
            echo "\n$k - ";
            extract($index);
            if($id){
                $res = Index::updateOrCreate(
                    [
                        'slug'=>$id, #atencao aqui !!!! id e slug combinados
                    ], #fixo
                    [
                        'name'=>$name,
                        'market'=>$market,
                        'last'=>$last,
                        'is_multi_asset_composite'=>$is_multi_asset_composite,
                        
                       
                    ]#var
                );
                echo $res ? "OK":"ERR";
            } else {
                echo "ID null";
            }
    
        }
    }
  
    public function derivatives(){

        $str = $this->get('derivatives');

        $derivatives = json_decode($str,true);
        foreach($derivatives as $k=>$derivative){
            echo "\n$k - ";
            #dd($derivative);
            extract($derivative);
            if($market){
                $res = Derivative::updateOrCreate(
                    [
                        'slug'=>Str::slug($market), #atencao aqui !!!! slug de market
                        'symbol'=>$symbol, 
                    ], #fixo
                    [
                        'market'=>$market, #atencao aqui !!!!
    
                        'index_id'=>$index_id,
                        'price'=>$price,
                        'price_percentage_change_24h'=>$price_percentage_change_24h,
                        'contract_type'=>$contract_type,
                        'index'=>$index,
                        'basis'=>$basis,
                        'spread'=>$spread,
                        'funding_rate'=>$funding_rate,
                        'index'=>$index,
                        'open_interest'=>$open_interest,
                        'volume_24h'=>$volume_24h,
                        'last_traded_at'=>$last_traded_at,
                        'expired_at'=>$expired_at,
                        
                    ]#var
                );
                echo $res ? "OK":"ERR";
    
            } else {
                echo "Market e portanto slug null";
            }
    
        }
    }
  

    public function history(){

        $coins = Coin::all()->pluck('slug')->toArray();

        foreach($coins as $coin){
            
            $c = \Carbon\Carbon::now()->subYears(5);
            
            for($d=1;$d<=44;$d+=15){

                $data = $c->addDays($d)->format("Y-m-d");
                $date = $c->addDays($d)->format("d-m-Y");
    
                $url = 'coins/'.$coin.'/history';
                $param = compact('date');
                $str = $this->get($url,$param);
    
                $history = json_decode($str,true);
    
                $current_prices = $history['market_data']['current_price']??[];
                
                $community_data = $history['community_data']??[];
                $developer_data = $history['developer_data']??[];
                $public_interest_stats = $history['public_interest_stats']??[];
                extract($community_data);
                extract($developer_data);
                extract($public_interest_stats);
                
                foreach($current_prices as $curr=>$current_price){
    
                    echo $curr.' - ';
                    echo $current_price;
    
                    $res = History::updateOrCreate(
                        [
                            'data'=>$data,
                            'coin'=>$coin, 
                            'curr'=>$curr,
                        ], #fixo
                        [
                            'current_price'=>$current_price,
                            'market_cap'=>$history['market_data']['current_price'][$curr],
                            'total_volume'=>$history['market_data']['total_volume'][$curr],
                            'facebook_likes'=>$facebook_likes,
                            'twitter_followers'=>$twitter_followers,
                            'reddit_average_posts_48h'=>$reddit_average_posts_48h,
                            'reddit_average_comments_48h'=>$reddit_average_comments_48h,
                            'reddit_subscribers' =>$reddit_subscribers,
                            'forks'=>$forks,
                            'stars'=>$stars,
                            'subscribers'=>$subscribers,
                            'total_issues'=>$total_issues,
                            'closed_issues'=>$closed_issues,
                            'pull_requests_merged'=>$pull_requests_merged,
                            'pull_request_contributors'=>$pull_request_contributors,
                            'alexa_rank'=>$alexa_rank,
                                                
                        ]#var
                    );
                    echo $res ? "OK":"ERR";
                }
        
            }
    
        }
    }


    private function get($path,array $param=[])
    {
      
        $url = self::URL.$path;

        if(!empty($param)){
            $res = Http::withHeaders(['accept' => 'application/json',])->get($url,$param);
        } else {
            $res = Http::withHeaders(['accept' => 'application/json',])->get($url);
        }
    
        if ($res->ok()){
            return $res->body();
        } else {
            echo $res->status();
            echo " erroooooooooo";
        }
        
    }


}
