<?php


use Phinx\Seed\AbstractSeed;

class UsersSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {

        $filename =  'db/seeds/users.json';
        $file = fopen($filename, 'r');
        $contents = fread($file, filesize($filename));
        $cont = json_decode($contents, true);
        // dd($cont);
        $contacts = [];
        foreach ($cont as $k => $v) {
            $contacts[] = [
                'userID' => $v['userID'],
                'name' => $v['name'],
                'password' => $v['password']
            ];
        }
        $this->insert('users', $contacts);
    }
}
