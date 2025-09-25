<?php

namespace spec\ThirdRailPackages\QueueSubscriber\Kafka;

use PhpSpec\ObjectBehavior;
use ThirdRailPackages\QueueSubscriber\Kafka\Message;
use ThirdRailPackages\QueueSubscriber\MessageInterface;

class MessageSpec extends ObjectBehavior
{
    const HEADERS = [
        'Content-Type' => 'application/json',
    ];
    const BODY = '[{"CC_MSG":{"msg_type":"CC","area_id":"Q4","time":"1758808468000","to":"FC21","descr":"2T72"}},{"SF_MSG":{"msg_type":"SF","area_id":"D0","time":"1758808468000","address":"1D","data":"00"}},{"CA_MSG":{"msg_type":"CA","area_id":"Y1","time":"1758808468000","from":"L725","to":"L731","descr":"1P27"}},{"SF_MSG":{"msg_type":"SF","area_id":"Q1","time":"1758808468000","address":"52","data":"EC"}},{"SF_MSG":{"msg_type":"SF","area_id":"YO","time":"1758808468000","address":"86","data":"F9"}},{"SF_MSG":{"msg_type":"SF","area_id":"C1","time":"1758808468000","address":"38","data":"E5"}},{"SF_MSG":{"msg_type":"SF","area_id":"X2","time":"1758808468000","address":"79","data":"44"}},{"CA_MSG":{"msg_type":"CA","area_id":"M3","time":"1758808468000","from":"DOAP","to":"COUT","descr":"2F19"}},{"SF_MSG":{"msg_type":"SF","area_id":"G3","time":"1758808468000","address":"05","data":"40"}},{"SF_MSG":{"msg_type":"SF","area_id":"ZY","time":"1758808468000","address":"00","data":"D5"}},{"SF_MSG":{"msg_type":"SF","area_id":"EB","time":"1758808468000","address":"5B","data":"7F"}},{"SF_MSG":{"msg_type":"SF","area_id":"Q3","time":"1758808468000","address":"35","data":"E3"}},{"SF_MSG":{"msg_type":"SF","area_id":"D7","time":"1758808468000","address":"45","data":"7E"}},{"SF_MSG":{"msg_type":"SF","area_id":"TW","time":"1758808468000","address":"2B","data":"10"}},{"CA_MSG":{"msg_type":"CA","area_id":"CV","time":"1758808468000","from":"3103","to":"3105","descr":"1M50"}},{"SF_MSG":{"msg_type":"SF","area_id":"SS","time":"1758808468000","address":"04","data":"AC"}},{"SF_MSG":{"msg_type":"SF","area_id":"W2","time":"1758808468000","address":"09","data":"00"}},{"CA_MSG":{"msg_type":"CA","area_id":"WI","time":"1758808468000","from":"0099","to":"0107","descr":"2C43"}},{"SF_MSG":{"msg_type":"SF","area_id":"X3","time":"1758808468000","address":"6E","data":"C0"}},{"CA_MSG":{"msg_type":"CA","area_id":"CL","time":"1758808468000","from":"0384","to":"HCUP","descr":"2H93"}},{"SF_MSG":{"msg_type":"SF","area_id":"YC","time":"1758808468000","address":"3D","data":"00"}},{"CA_MSG":{"msg_type":"CA","area_id":"XB","time":"1758808468000","from":"0572","to":"0564","descr":"1H35"}},{"CB_MSG":{"msg_type":"CB","area_id":"BP","time":"1758808468000","from":"LSFB","descr":"1W22"}},{"CA_MSG":{"msg_type":"CA","area_id":"VC","time":"1758808468000","from":"0120","to":"0110","descr":"9G36"}},{"SF_MSG":{"msg_type":"SF","area_id":"Q7","time":"1758808468000","address":"27","data":"02"}},{"SF_MSG":{"msg_type":"SF","area_id":"AD","time":"1758808468000","address":"43","data":"3B"}},{"SF_MSG":{"msg_type":"SF","area_id":"Q1","time":"1758808468000","address":"07","data":"83"}},{"SF_MSG":{"msg_type":"SF","area_id":"EK","time":"1758808468000","address":"55","data":"75"}},{"SF_MSG":{"msg_type":"SF","area_id":"G2","time":"1758808468000","address":"0E","data":"84"}},{"CB_MSG":{"msg_type":"CB","area_id":"CC","time":"1758808468000","from":"MP01","descr":"2A37"}},{"SF_MSG":{"msg_type":"SF","area_id":"D3","time":"1758808468000","address":"03","data":"00"}},{"SF_MSG":{"msg_type":"SF","area_id":"CA","time":"1758808468000","address":"68","data":"81"}}]';


    function let(\RdKafka\Message $frame)
    {
        $frame->headers = self::HEADERS;
        $frame->payload = self::BODY;

        $this->beConstructedWith($frame);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Message::class);
        $this->shouldImplement(MessageInterface::class);
    }

    function it_can_decode_json_message_body()
    {
        $this->getHeaders()->shouldBe(self::HEADERS);
        $this->getBody()->shouldBe(self::BODY);
    }
}
