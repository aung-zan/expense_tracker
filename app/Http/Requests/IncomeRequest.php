<?php

namespace App\Http\Requests;

use App\Http\Repositories\IncomeRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class IncomeRequest extends FormRequest
{
    private $incomeRepository;

    public function __construct(IncomeRepository $incomeRepository)
    {
        $this->incomeRepository = $incomeRepository;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'income_id' => 'integer',
            'name' => 'max:255|unique:incomes,name',
            'amount' => 'required|integer',
            'income_date' => 'required',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $data = $this->validationData();

                if (array_key_exists('income_id', $data) && $this->checkIncomeCreated($data)) {
                    $validator->errors()->add(
                        'income',
                        'The income is already created.'
                    );
                }
            },
        ];
    }

    private function checkIncomeCreated($data): bool
    {
        $incomeId = $data['income_id'];
        $incomeDate = $data['income_date'];

        $income = $this->incomeRepository->getIncomeByIdAndDate($incomeId, $incomeDate);

        return !is_null($income);
    }
}
