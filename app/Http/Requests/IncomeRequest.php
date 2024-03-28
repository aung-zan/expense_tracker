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
            'income_type_id' => 'required|integer',
            'amount' => 'required|integer',
            'income_date' => 'required',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'income_type_id' => 'income type',
        ];
    }

    /**
     * Custom validation after the validation rules.
     *
     * @return array
     */
    public function after(): array
    {
        return [
            function (Validator $validator) {
                $data = $this->validationData();

                if ($this->incomeDuplicate($data)) {
                    $validator->errors()->add(
                        'income',
                        'The income is already created.'
                    );
                }
            },
        ];
    }

    /**
     * Custom validation: check income duplicate.
     *
     * @param array $data
     * @return bool
     */
    private function incomeDuplicate($data): bool
    {
        // $userId = auth()->user()->id;
        // $incomeTypeId = $data['income_type_id'];
        // $incomeDate = $data['income_date'];
        $data['user_id'] = auth()->user()->id;

        if ($this->route('income_id')) {
            $data['income_id'] = $this->route('income_id');
        }

        $income = $this->incomeRepository->getIncomeByIdAndDate($data);

        return !is_null($income);
    }
}
