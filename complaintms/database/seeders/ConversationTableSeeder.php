<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Assign;
use App\Models\Attachment;
use App\Models\Conversation;
use App\Models\Department;
use App\Models\Ticket;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConversationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attaches = [
            ['path' => '/storage/attachments/test-test','name' => 'f_1.pdf'],
            ['path' => '/storage/attachments/test-test','name' => 'f_2.jpg'],
            ['path' => '/storage/attachments/test-test','name' => 'f_3.pptx'],
            ['path' => '/storage/attachments/test-test','name' => 'f_4.png'],
            ['path' => '/storage/attachments/test-test','name' => 'f_5.doc'],
            ['path' => '/storage/attachments/test-test','name' => 'f_6.docx'],
            ['path' => '/storage/attachments/test-test','name' => 'f_7.bmp'],
            ['path' => '/storage/attachments/test-test','name' => 'f_8.webp'],
            ['path' => '/storage/attachments/test-test','name' => 'f_9.ppt'],
            ['path' => '/storage/attachments/test-test','name' => 'f_10.xls'],
            ['path' => '/storage/attachments/test-test','name' => 'f_11.xlsx'],
        ];

        $ticket_ids = Ticket::all('id')->pluck('id')->toArray();
        $admin_ids = Admin::all('id')->pluck('id')->toArray();
        $department_ids = Department::all('id')->pluck('id')->toArray();
        $department_ids[] = null;
        $faker = Factory::create();
        foreach($ticket_ids as $ticket_id)
        {
            $date = now()->subMonths(5);

            $u_assign = new Assign();
            $u_assign->ticket_id = $ticket_id;
            $u_assign->department_id = $department_ids[array_rand($department_ids)];
            $u_assign->admin_id = null;
            $u_assign->created_at = $date;
            $u_assign->updated_at = $date;
            $u_assign->save();

            $j=rand(2,5);
            foreach (range(1,$j) as $i)
            {
                $date = $date->addDays($i*2);
                $d_id = $department_ids[array_rand($department_ids)];
                $conv = new Conversation();
                $conv->ticket_id = $ticket_id;
                $conv->description = $faker->realText(500);
                $conv->department_id = $i == 1 ? null : $d_id;
                $conv->publish = rand(0,1);
                $conv->created_at = $date;
                $conv->updated_at = $date;
                $conv->save();

                $m = rand(1,10);
                foreach (range(1,$m) as $n)
                {
                    $file = array_rand($attaches);
                    //$url = json_encode($attaches[$file], JSON_PRETTY_PRINT);
                    //dd($url);
                    $attachment = new Attachment();
                    $attachment->url = $attaches[$file];
                    //$attachment->content_type = $attaches[$file][1];
                    $attachment->conversation_id = $conv->id;
                    $attachment->save();
                }

                /*if($d_id != null)
                {
                    $assign = new Assign();
                    $assign->ticket_id = $ticket_id;
                    $assign->department_id = $d_id;
                    $assign->admin_id = $admin_ids[array_rand($admin_ids)];
                    $assign->created_at = $date;
                    $assign->updated_at = $date;
                    $assign->save();
                }*/


                foreach ($department_ids as $i=>$row) {
                    if ($row === null)
                        unset($department_ids[$i]);
                }
                $assign = new Assign();
                $assign->ticket_id = $ticket_id;
                $assign->department_id = $department_ids[array_rand($department_ids)];
                $assign->admin_id = $admin_ids[array_rand($admin_ids)];
                $assign->created_at = $date;
                $assign->updated_at = $date;
                $assign->save();

            }
        }
    }
}
