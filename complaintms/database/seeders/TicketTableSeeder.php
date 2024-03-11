<?php

namespace Database\Seeders;

use App\Enums\TicketStatusEnum;
use App\Models\Admin;
use App\Models\Category;
use App\Models\FiscalYear;
use App\Models\Medium;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use ReflectionClass;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = User::all()->pluck('id')->toArray();
        $fy_ids = FiscalYear::all('id')->pluck('id')->toArray();
        $cat_ids = Category::all('id')->pluck('id')->toArray();
        $media_ids = Medium::all('id')->pluck('id')->toArray();
        $faker = Factory::create();
        $ref = new ReflectionClass(TicketStatusEnum::class);
        $statuses = $ref->getConstants();
        for ($i= 1; $i<=200; $i++)
        {
            $ticket = new Ticket();
            $ticket->status = $statuses[array_rand($statuses)];
            $ticket->status_date = Carbon::now();
            $ticket->user_id = $user_ids[array_rand($user_ids)];; //use random
            $ticket->ticket_number = $this->generateTicketNumber();
            $ticket->fiscal_year_id = $fy_ids[array_rand($fy_ids)];
            $ticket->subject = $faker->realText(50);
            $ticket->category_id = $cat_ids[array_rand($cat_ids)];;
            $ticket->medium_id = $media_ids[array_rand($media_ids)];;
            $ticket->visible = rand(0,1);
            $ticket->save();
        }
    }

    // private function generateTicketNumber() {
    //     //$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //     $chars ="TmcEnsD1ZVWz258qiIopXAFw6fvrltMhPUex0YGOjRS3abHyJCNd4KuL7Qkg9B";
    //     $base = 62;
    //     $result = '';
    //     $num = explode(' ',microtime());
    //     $num[0] = substr(explode('.',$num[0])[1], 0, 4);
    //     $num = $num[1].$num[0];
    //     $num = gmp_init($num);

    //     while (gmp_cmp($num, 0) > 0) {
    //         $remainder = gmp_intval(gmp_mod($num, $base));
    //         $result = $chars[$remainder] . $result;
    //         $num = gmp_div_q($num, $base);
    //     }

    //     return "HM-$result";
    // }

    private function generateTicketNumber() {
        $chars = "ztau39y2sdnr846hfw7ceibkgpjqv5l1m";
        usleep(1000);
        $base = 33;
        $result = '';
        $num = explode(' ',microtime());
        $num[0] = substr(explode('.',$num[0])[1], 0, 3);
        $num = $num[1].$num[0];
        $num = gmp_init($num);
    
        while (gmp_cmp($num, 0) > 0) {
            $remainder = gmp_intval(gmp_mod($num, $base));
            $result = $chars[$remainder] . $result;
            $num = gmp_div_q($num, $base);
        }
    
        return "HM-$result";
    }
    
}
