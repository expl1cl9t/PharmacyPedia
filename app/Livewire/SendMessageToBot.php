<?php

namespace App\Livewire;

use Carbon\Traits\Date;
use Livewire\Component;

class SendMessageToBot extends Component
{
    public $NameToRefer;
    public $Article;

    public function sendMessage(){
        try {
            $code = random_int(1000,10000);
            $token = "6864560001:AAHypsS6Qm4UMtlVg_c_YCL8Pm5sBduneXc";
            $chat_id = config('tgbotconfig.bot_chat_id');
            $message = $this->NameToRefer." написал(а): ".$this->Article. ". Дата обращения: " . \date('D, d M Y H:i:s'). '. Уникальный номер обращения: ' . $code
            .". Контактные данные пользователя: номер телефона - " . auth()->user()->PhoneNumber. ', почта: <' . auth()->user()->email. '>.';
            $this->sendToTgApi($chat_id, $message, $token);
            $this->dispatch('WasSent', code: $code);
        }
        catch(\Exception $ex){
            $this->dispatch('errorWhereSend', error: $ex->getMessage());
        }
    }

    public function sendToTgApi($chatID, $messaggio, $token){
        $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
        $url = $url . "&text=" . urlencode($messaggio);
        $ch = curl_init();
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function render()
    {
        return view('livewire.send-message-to-bot');
    }
}
