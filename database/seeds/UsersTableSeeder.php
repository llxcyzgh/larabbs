<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        // 头像假数据
        $avatars = [
//            '/uploads/images/201710/14/1/s5ehp11z5s.png?imageView2/1/w/200/h/200',
            '/uploads/images/avatars/201809/17/1_1537184717_Lhd1SHqu86.png',
            '/uploads/images/avatars/201809/17/1_1537184717_LOnMrqbHJn.png',
            '/uploads/images/avatars/201809/17/1_1537184717_NDnzMutoxX.png',
            '/uploads/images/avatars/201809/17/1_1537184717_s5ehp11z6s.png',
            '/uploads/images/avatars/201809/17/1_1537184717_ZqM7iaP4CR.png',
        ];

        // 生成数据集合
        $users = factory(User::class)
            ->times(10)
            ->make()
            ->each(function ($user, $index) use ($faker, $avatars) {
                $user->avatar = $faker->randomElement($avatars);
            });

        //让隐藏字段可见,并将数据集合转换为数组
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        // 插入到数据库中
        User::insert($user_array);

        // 单独处理第一个用户的数据
//        $user           = User::find(1);
        $user           = User::first();
        $user->name     = 'youyou';
        $user->email    = '1559296632@qq.com';
        $user->password = bcrypt('password');
        $user->save();


    }
}
