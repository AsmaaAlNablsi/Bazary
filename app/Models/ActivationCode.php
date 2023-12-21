<?php

namespace App\Models;

use App\Exceptions\MobileExceptions\ActivationCodeException;
use App\Exceptions\MobileExceptions\GeneralMobileException;
use App\Helpers\DateHelper;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ActivationCode extends Model
{
    protected $table = 'activation_codes';

    protected $fillable = [
        'mobile',
        'activation_code',
        'is_active',
        'activated',
    ];

    public static function generateCode($mobile)
    {
        try {
            $code = rand(0, 99999);
            $code = str_pad($code, 5, '0', STR_PAD_LEFT);
            DB::beginTransaction();
            $activationCode = self::create(['mobile' => $mobile, 'activation_code' => $code]);
            DB::commit();
            //TODO: send SMS
            if (env('APP_DEBUG'))
                return ['activation_code' => $activationCode];
            else
                return [];
        } catch (Throwable $exception) {
            DB::rollBack();
            throw new GeneralMobileException();
        }
    }

    public static function verifyActivation($requestData)
    {
        try {
            $activationCode = ActivationCode::where($requestData)->where(['is_active' => true])->firstOrFail();
            if (DateHelper::checkDiff($activationCode->created_at)) {
                $activationCode->update(['is_active' => false]);
                throw new ActivationCodeException('code_not_valid');
            }
            $activationCode->update(['activated' => true]);
            return $activationCode;
        } catch (ModelNotFoundException $e) {
            throw new ActivationCodeException('code_not_valid');
        } catch (Throwable $exception) {
            throw new GeneralMobileException();
        }
    }

}
