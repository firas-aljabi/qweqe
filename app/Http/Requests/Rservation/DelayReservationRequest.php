<?php

namespace App\Http\Requests\Rservation;

use App\Statuses\ReasonCancleDelay;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DelayReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'reservation_id' => 'required|exists:reservations,id',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'delay_date' => 'nullable|date_format:Y-m-d H:i:s',
            'reason_delay' => ['required', Rule::in(ReasonCancleDelay::$statuses)],
        ];
    }
}
