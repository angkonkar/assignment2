<?php

declare(strict_types=1);

class FinanceManager
{
    public function addIncome($amount, $category){
        
        $incomeCategories = ["Salary", "Business", "Loan"];

        if (in_array($category, $incomeCategories)) {
            if (file_exists('incomes.txt')) {
                $contents = json_decode(file_get_contents('incomes.txt'), true);
            
                if (isset($contents[$category])) {
                    $contents[$category] += $amount;
                } else {
                    $contents[$category] = $amount;
                }

                file_put_contents('incomes.txt', json_encode($contents));
            }
            else{
                file_put_contents('incomes.txt', json_encode(array($category => $amount)));
            }
            echo "Income Successfully Added" . PHP_EOL;
        }
        else{
            echo "Wrong Category! Please choose a valid category." . PHP_EOL;
        }

    }

    public function addExpense($amount, $category){
        
        $expenseCategories = ["Rent", "Family", "Recreation", "Food"];

        if (in_array($category, $expenseCategories)) {
            if (file_exists('expenses.txt')) {
                $contents = json_decode(file_get_contents('expenses.txt'), true);
            
                if (isset($contents[$category])) {
                    $contents[$category] += $amount;
                } else {
                    $contents[$category] = $amount;
                }

                file_put_contents('expenses.txt', json_encode($contents));
            }
            else{
                file_put_contents('expenses.txt', json_encode(array($category => $amount)));
            }
            echo "Expense Successfully Added" . PHP_EOL;
        }
        else{
            echo "Wrong Category! Please choose a valid category." . PHP_EOL;
        }

    }

    public function viewIncomes()
    {
        if (file_exists('incomes.txt')) {
            $incomes = json_decode(file_get_contents('incomes.txt'), true);

            echo "---------------------------------". PHP_EOL;
            foreach ($incomes as $category => $amount) {
                echo $category . " : " . $amount .PHP_EOL;
            }
            echo "---------------------------------". PHP_EOL;
        }
        else {
            echo "No incomes found! Add income first." . PHP_EOL;
        }
    }

    public function viewExpanses()
    {
        if (file_exists('expenses.txt')) {
            $incomes = json_decode(file_get_contents('expenses.txt'), true);

            echo "---------------------------------". PHP_EOL;
            foreach ($incomes as $category => $amount) {
                echo $category . " : " . $amount .PHP_EOL;
            }
            echo "---------------------------------". PHP_EOL;
        }
        else {
            echo "No expenses found! Add expense first." . PHP_EOL;
        }
    }

    public function viewSavings()
    {
        $allIncomes = 0;
        $allExpenses = 0;

        
        if (file_exists('incomes.txt')) {
            $incomes = json_decode(file_get_contents('incomes.txt'), true);
            foreach ($incomes as $category => $amount) {
                $allIncomes += $amount;
            }
        }
        
        if (file_exists('expenses.txt')) {
            $expenses = json_decode(file_get_contents('expenses.txt'), true);
            foreach ($expenses as $category => $amount) {
                $allExpenses += $amount;
            }
        }

        if ($allIncomes > $allExpenses) {
            echo "---------------------------------". PHP_EOL;
            echo "You have a savings of: " . ($allIncomes - $allExpenses) . PHP_EOL;
            echo "---------------------------------". PHP_EOL;
        }
        else {
            echo "---------------------------------". PHP_EOL;
            echo "You don't have any savings yet !" . PHP_EOL;
            echo "---------------------------------". PHP_EOL;
        }
    }

    public function viewCategories(){
        echo "---------------------------------". PHP_EOL;
        echo "Name: Salary, Type: Income" . PHP_EOL;
        echo "Name: Business, Type: Income" . PHP_EOL;
        echo "Name: Loan, Type: Income" . PHP_EOL;
        echo "Name: Rent, Type: Expense" . PHP_EOL;
        echo "Name: Family, Type: Expense" . PHP_EOL;
        echo "Name: Recreation, Type: Expense" . PHP_EOL;
        echo "Name: Food, Type: Expense" . PHP_EOL;
        echo "---------------------------------". PHP_EOL;
    }
}