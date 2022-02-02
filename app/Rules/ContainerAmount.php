<?php

namespace App\Rules;

use App\Models\Container;
use Illuminate\Contracts\Validation\Rule;

class ContainerAmount implements Rule
{
    public $amount;
    public $container_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($amount, $container_id)
    {
        $this->amount = $amount;
        $this->container_id = $container_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $container = Container::find($this->container_id);
        if ($container->products) {
            $productsArr = $container->products->pluck('amount')->sum();
        } else {
            $productsArr = 0;
        }
        if ($productsArr + $this->amount > $container->total_amount) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A quantidade desse produto ultrapassa a capacidade desse container.';
    }
}
