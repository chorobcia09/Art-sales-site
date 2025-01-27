<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;

class TransactionsTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $amount = rand(10, 1000);
            $paymentMethods = ['karta', 'gotówka'];
            $paymentMethod = $paymentMethods[array_rand($paymentMethods)];

            Transaction::create([
                'user_id' => $user->id,
                'amount' => $amount,
                'description' => $paymentMethod
            ]);
        }
    }
}
