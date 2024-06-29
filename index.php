<?php

declare(strict_types=1);

require __DIR__ . '/FinanceManager.php';

class Application
{
    private FinanceManager $financeManager;

    private const ADD_INCOME = 1;
    private const ADD_EXPENSE = 2;
    private const VIEW_INCOME = 3;
    private const VIEW_EXPENSE = 4;
    private const VIEW_SAVINGS = 5;
    private const VIEW_CATAGORIES = 6;
    private const EXIT_APP = 7;

    private array $options = [
        self::ADD_INCOME => 'Add Income',
        self::ADD_EXPENSE => 'Add Expense',
        self::VIEW_INCOME => 'View Incomes',
        self::VIEW_EXPENSE => 'View Expenses',
        self::VIEW_SAVINGS => 'View Savings',
        self::VIEW_CATAGORIES => 'View Catagories',
        self::EXIT_APP => 'Exit'
    ];

    public function __construct()
    {
        $this->financeManager = new FinanceManager();
    }
    public function run(): void
    {
        while (true) {
            foreach ($this->options as $option => $label) {
                printf("%d. %s\n", $option, $label);
            }

            $userInput = intval(readline("Enter your option: "));

            switch ($userInput) {
                case 1:
                    $amount = (float)trim(readline("Enter income amount: "));
                    $category = trim(readline("Enter income category: "));
                    $this->financeManager->addIncome($amount, $category);
                    break;
                case 2:
                    $amount = (float)trim(readline("Enter expense amount: "));
                    $category = trim(readline("Enter expense category: "));
                    $this->financeManager->addExpense($amount, $category);
                    break;
                case 3:
                    $this->financeManager->viewIncomes();
                    break;
                case 4:
                    $this->financeManager->viewExpanses();
                    break;
                case 5:
                    $this->financeManager->viewSavings();
                    break;
                case 6:
                    $this->financeManager->viewCategories();
                    break;
                case 7:
                    return;
            }
        }
    }
}

$application = new Application();

$application->run();