<?php
namespace MigratoryData\Client;
class MigratoryDataException extends \Exception
{
    const E_INVALID_URL = 1;
    const E_RUNNING = 2;
    const E_NOT_CONNECTED = 3;
    const E_ILLEGAL_ARGUMENT = 4;
    const E_NOT_SET = 5;
    protected $a = array();
    protected $b = "";
    protected $code = -1;
    protected $message = "";
    public function getCause()
    {
        return $this->b;
    }
    public function getDetail()
    {
        return $this->message;
    }
    public function getExceptions()
    {
        return $this->a;
    }
    public function __construct($code, $cause = "", $exceptions = array())
    {
        $this->code = $code;
        $this->b = $cause;
        $this->a = $exceptions;
        $this->message = $this->getErrorInfo($code);
    }
    private function getErrorInfo($errorCode)
    {
        $ret = "";
        switch ($errorCode) {
            case self::E_INVALID_URL:
                $ret = "Invalid URL";
                break;
            case self::E_RUNNING:
                $ret = "You can't use this method because the client is already running, use it before connect() or use disconnect()";
                break;
            case self::E_NOT_CONNECTED:
                $ret = "You can't use this method because you didn't connect to a MigratoryData server, use connect() first";
                break;
            case self::E_ILLEGAL_ARGUMENT:
                $ret = "Illegal argument";
                break;
            case self::E_NOT_SET:
                $ret = "A mandatory object for the connect operation is not set";
                break;
            default:
                $ret = "Unknown";
                break;
        }
        return $ret;
    }
}
interface c
{
	public function d($e);
	public function f($g);
	public function h($e, $i);
}
interface MigratoryDataListener
{
    function onMessage($message);
    function onStatus($status, $info);
}
class MigratoryDataLogLevel
{
    const TRACE = 0;
    const DEBUG = 1;
    const INFO = 2;
    const WARN = 3;
    const ERROR = 4;
}
interface MigratoryDataLogListener
{
    function onLog($log, $migratoryDataLogLevel);
}
class QoS
{
    const STANDARD = 0;
    const GUARANTEED = 1;
}
class MessageType
{
    const SNAPSHOT = 0;
    const UPDATE = 1;
    const RECOVERED = 2;
    const HISTORICAL = 3;
}
class MigratoryDataMessage
{
    private $j = "";
    private $k = "";
    private $l = "";
    private $m = "";
    private $n = null;
    protected $o = null;
    protected $p;
    protected $q;
    protected $r;
    protected $s = MessageType::UPDATE;
    public function __construct($subject, $content, $closure = "", $qos = QoS::GUARANTEED, $retained = true, $replySubject = "")
    {
        $this->j = $subject;
        $this->k = $content;
        $this->l = $closure;
        $this->n = $qos;
        $this->o = $retained;
        $this->m = $replySubject;
    }
    public function getSubject()
    {
        return $this->j;
    }
    public function getContent()
    {
        return $this->k;
    }
    public function getClosure()
    {
        return $this->l;
    }
    public function getQos()
    {
        return $this->n;
    }
    public function isRetained()
    {
        return $this->o;
    }
    public function getReplySubject()
    {
        return $this->m;
    }
    public function getMessageType()
    {
        return $this->s;
    }
    public function setCompressed($compressionBool)
    {
        $this->r = $compressionBool;
    }
    public function isCompressed()
    {
        return $this->r;
    }
    public function __toString()
    {
        $t = "GUARANTEED";
        if ($this->n === QoS::STANDARD) {
            $t = "STANDARD";
        }
        $u = "SNAPSHOT";
        if ($this->s === MessageType::UPDATE) {
            $u = "UPDATE";
        } else if ($this->s === MessageType::RECOVERED) {
            $u = "RECOVERED";
        } else if ($this->s === MessageType::HISTORICAL) {
            $u = "HISTORICAL";
        }
        return "[" .
            "subject=" .
            $this->j .
            ", content=" .
            $this->k .
            ", closure=" .
            $this->l .
            ", replySubject=" .
            $this->m .
            ", retained=" .
            v::w($this->o) .
            ", qos=" .
            $t .
            ", messageType=" .
            $u .
            ", seq=" .
            $this->p .
            ", epoch=" .
            $this->q .
            ", compression=" .
            v::w($this->r) .
            "]";
    }
}
class x
{
    private $y = "";
    private $z = -1;
    private $a0 = -1;
    private $a1 = -1;
    private $a2 = -1;
    private $a3 = 0;
    private $a4 = "";
    private $a5 = -1;
    public function __construct()
    {
    }
    public function a6($y)
    {
        $this->y .= $y;
    }
    public function a7($y)
    {
        $this->a4 .= $y;
    }
    public function a8()
    {
        $this->a5 = ($this->a5 == 3) ? 0 : ($this->a5 + 1);
        return $this->a4[$this->a5];
    }
    public function a9()
    {
        return $this->a3;
    }
    public function a3($a3)
    {
        $this->a3 = $a3;
    }
    public function aa($ab, $ac)
    {
        $this->y[$ab] = $ac;
    }
    public function ad($ab)
    {
        return $this->y[$ab];
    }
    public function ae()
    {
        $this->z = strlen($this->y);
    }
    public function af()
    {
        $this->a0 = strlen($this->y);
    }
    public function ag()
    {
        $this->a1 = strlen($this->y);
    }
    public function ah()
    {
        $this->a2 = strlen($this->y);
    }
    public function ai()
    {
        return $this->z;
    }
    public function aj()
    {
        return $this->a0;
    }
    public function ak()
    {
        return $this->a1;
    }
    public function al()
    {
        return $this->a2;
    }
    public function am($__data)
    {
        $this->y = $__data;
    }
    public function an()
    {
        return $this->y;
    }
    public function ao()
    {
        if($this->a3 === 0){
            return $this->y;
        } else {
            return substr($this->y, $this->a3);
        }
    }
    public function ap()
    {
        return strlen($this->y);
    }
    public function aq()
    {
        $this->y = "";
        $this->a3 = 0;
    }
    public function ar()
    {
        $this->y = substr($this->y, $this->a3);
        $this->a3 = 0;
    }
}
class at
{
    private $au;
    private $e;
    private $av;
    private $aw;
    private $ax;
    private $ay;
    private $az;
    private $b0;
    private $b1 = null;
    private $b2 = array();
    private $g = null;
    public function __construct($au, $e, $av,
                                $ax, $ay, $az)
    {
        $this->au = $au;
        $this->e = $e;
        $this->av = $av;
        $this->aw = $au->b3();
        $this->ax = $ax;
        $this->ay = $ay;
        $this->az = $az;
        $this->b0 = $au->b4();
        $this->g = new x();
    }
    public function b5()
    {
        $b6 = new \React\Socket\Connector($this->aw, array(
            'tls' => array(
                'allow_self_signed' => true
            ),
            'timeout' => ($this->b0->b7() / 1000)
        ));
        $b8 = "";
        if ($this->b0->b9()) {
            $b8 = "tls://";
        }
        $b6->connect($b8 . $this->e . ":" . $this->av)
            ->then(
                function (\React\Socket\ConnectionInterface $b1) {
                    $this->b1 = $b1;
                    if (count($this->b2) > 0) {
                        foreach ($this->b2 as $message) {
                            $b1->write($message);
                        }
                        $this->b2 = array();
                    }
                    $this->au->ba();
                    $b1->on('data', function ($y) {
                        if (isset($y) && strlen($y) !== 0) {
                            $this->g->a6($y);
                            $this->au->bb($this->g);
                            if ($this->g->a9() > 0 && $this->g->a9() < strlen($this->g->an())) {
                                $this->g->ar();
                            } else if ($this->g->a9() >= $this->g->ap()) {
                                $this->g->aq();
                            }
                        }
                    });
                    $b1->on('end', function () {
                        $this->au->bc($this->ay, v::bd, "socket_end");
                    });
                    $b1->on('close', function () {
                        $this->au->bc($this->ay, v::bd, "socket_close");
                    });
                    $b1->on('error', function (\Exception $e) {
                        $this->au->bc($this->ay, v::bd, "socket_error");
                    });
                },
                function (\Exception $exception) {
                    $this->az->be("Failed to connect to: " . $this->au->bf()->bg() . ", message: " . $exception->getMessage());
                    $this->ax->bc($this->au->bh(), v::bi);
                }
            );
    }
    public function bj($y)
    {
        if (isset($this->b1)) {
            $this->b1->write($y);
        } else {
            array_push($this->b2, $y);
        }
    }
    public function bk()
    {
        if (isset($this->b1)) {
            $this->b1->close();
            $this->b1 = null;
        }
    }
}
class bl implements MigratoryDataLogListener
{
    function onLog($log, $migratoryDataLogLevel)
    {
        if ($migratoryDataLogLevel === MigratoryDataLogLevel::TRACE) {
            $bm = "TRACE";
        } else if ($migratoryDataLogLevel === MigratoryDataLogLevel::DEBUG) {
            $bm = "DEBUG";
        } else if ($migratoryDataLogLevel === MigratoryDataLogLevel::INFO) {
            $bm = "INFO";
        } else if ($migratoryDataLogLevel === MigratoryDataLogLevel::WARN) {
            $bm = "WARN";
        } else if ($migratoryDataLogLevel === MigratoryDataLogLevel::ERROR) {
            $bm = "ERROR";
        }
        $bn = date('Y-m-d H:i:s');
        echo "[" . $bn . "] [" . $bm . "] " . $log . PHP_EOL;
    }
}
interface bo
{
    function bp($bq);
    function br($bq);
    function be($bq);
    function bs($bq);
    function bt($bq);
}
class bu implements bo
{
    private $bv;
    private $bw = MigratoryDataLogLevel::INFO;
    public function __construct()
    {
        $this->bv = new bl();
    }
    public function bx($bv, $bw)
    {
        $this->bv = $bv;
        $this->bw = $bw;
    }
    function bp($bq)
    {
        if ($this->bw <= MigratoryDataLogLevel::TRACE) {
            $this->bv->onLog($bq, MigratoryDataLogLevel::TRACE);
        }
    }
    function br($bq)
    {
        if ($this->bw <= MigratoryDataLogLevel::DEBUG) {
            $this->bv->onLog($bq, MigratoryDataLogLevel::DEBUG);
        }
    }
    function be($bq)
    {
        if ($this->bw <= MigratoryDataLogLevel::INFO) {
            $this->bv->onLog($bq, MigratoryDataLogLevel::INFO);
        }
    }
    function bs($bq)
    {
        if ($this->bw <= MigratoryDataLogLevel::WARN) {
            $this->bv->onLog($bq, MigratoryDataLogLevel::WARN);
        }
    }
    function bt($bq)
    {
        if ($this->bw <= MigratoryDataLogLevel::ERROR) {
            $this->bv->onLog($bq, MigratoryDataLogLevel::ERROR);
        }
    }
}
class by
{
    const bz = "[READ_EVENT] ";
    const c0 = "[PING_EVENT] ";
    const c1 = "[CONNECT_EVENT] ";
    const c2 = "[DISCONNECT_EVENT] ";
    const c3 = "[READER_DISCONNECT_EVENT] ";
    const c4 = "[MESSAGE_RECEIVED_EVENT] ";
    const c5 = "[WRITE_EVENT] ";
    const c6 = "[CLIENT_PUBLISH_RESPONSE] ";
    const c7 = "[ACK_FAILED_PUBLISH_WITH_CLOSURES] ";
    const c8 = "[ENTITLEMENT_CHECK_RESPONSE] ";
    const c9 = "[DISPOSE_EVENT] ";
    const ca = "[PAUSE_EVENT] ";
    const cb = "[RESUME_EVENT] ";
    const cc = "[SUBSCRIBE_EVENT] ";
    const cd = "[UNSUBSCRIBE_EVENT] ";
    const ce = "[PUBLISH_EVENT] ";
    const cf = "[REPUBLISH_EVENT] ";
    const cg = "[PING_SERVER_EVENT] ";
    const ch = "[CONNECT_SERVER_EVENT] ";
    const ci = "[RECONNECT_EVENT] ";
}
class cj
{
    private $ck = 2;
    private $j;
    private $cl;
    private $p = 0;
    private $cm = 70000;
    private $cn = false;
    private $co = 0;
    private $cp = 0;
    private $cq = v::cr;
    private $cs = ct::cu;
    public function __construct($j, $cl)
    {
        $this->j = $j;
        $this->cl = $cl;
    }
    public function cv()
    {
        return $this->p;
    }
    public function cw($p)
    {
        $this->p = $p;
        $this->cp++;
    }
    public function cx()
    {
        return $this->cm;
    }
    public function cy($cm)
    {
        $this->cm = $cm;
    }
    public function cz()
    {
        return $this->j;
    }
    public function d0()
    {
        return $this->cl;
    }
    public function d1()
    {
        $this->cp = 0;
        if ($this->d2()) {
            $this->co++;
        }
    }
    public function d3()
    {
        $this->co = 0;
    }
    public function cp()
    {
        return $this->cp;
    }
    public function d4($d5)
    {
        $this->cq = $d5;
    }
    public function d6()
    {
        return $this->cq;
    }
    public function d2()
    {
        return $this->cm != 70000;
    }
    public function d7()
    {
        $d8 = ct::cu;
        if ($this->d2()) {
            if ($this->co >= $this->ck) {
                if ($this->cl > 0) {
                    $d8 = ct::d9;
                }
            } else {
                $d8 = ct::da;
            }
        } else {
            if ($this->cl > 0) {
                $d8 = ct::d9;
            }
        }
        if ($d8 == ct::cu || $d8 == ct::d9) {
            $this->d4(v::cr);
            $this->d3();
        }
        $this->cs = $d8;
        return $d8;
    }
    public function cs()
    {
        return $this->cs;
    }
    public function db()
    {
        $this->cs = ct::cu;
    }
    public function dc()
    {
        $this->p = 0;
        $this->cm = 70000;
        $this->cn = false;
        $this->co = 0;
        $this->cp = 0;
        $this->cq = v::cr;
        $this->cs = ct::cu;
    }
    public function __toString()
    {
        return "[Subj=" .
            $this->j .
            ", Seq=" . $this->p .
            ", SeqId=" . $this->cm .
            ", NeedRecovery=" . v::w($this->cn) .
            ", MessagesReceivedUntilRecovery=" . $this->cp .
            ", CacheRecoveryStatus=" . $this->cq .
            ", SubscribeType=" . $this->cs .
            ", NrOfConsecutiveRecovery=" . $this->co .
            "]";
    }
}
class ct
{
    const cu = 0;
    const d9 = 1;
    const da = 2;
}
class dd
{
    private $de;
    private $df;
    public function __construct($de, $df)
    {
        $this->de = $de;
        $this->df = $df;
    }
    public function dg()
    {
        return $this->de;
    }
    public function dh()
    {
        return $this->df;
    }
    public function __toString()
    {
        $di = "";
        if (isset($this->df) && isset($this->de)) {
            $di .= "OPERATION " . $this->dj($this->de);
            $di .= " Headers ";
            $dk = array_keys($this->df);
            foreach ($dk as $dl) {
                $dm = $this->dn($dl);
                $di .= $dm . ": " . $this->df[$dl] . " - ";
            }
        }
        return $di;
    }
    private function dj($dp)
    {
        switch ($dp) {
            case 0:
                return "SUBSCRIBE";
            case 1:
                return "UNSUBSCRIBE";
            case 2:
                return "PUBLISH";
            case 3:
                return "PING";
            case 4:
                return "IFRAME";
            case 5:
                return "DISCONNECT";
            case 6:
                return "AGENT_CONNECT";
            case 7:
                return "RECOVERY_CACHE";
            case 8:
                return "RECOVERY_IMAGE";
            case 9:
                return "ENTITLEMENT_CHECK";
            case 10:
                return "RESET_SUBJECT";
            case 11:
                return "PROXY";
            case 12:
                return "ACK";
            case 13:
                return "STALE";
            case 14:
                return "ADD_DATA_REF";
            case 15:
                return "CLIENT_PUBLISH";
            case 16:
                return "CLIENT_PUBLISH_RESPONSE";
            case 17:
                return "SYNC_SUBSCRIPTION";
            case 18:
                return "CONNECT";
        }
        return "";
    }
    private function dn($dp)
    {
        switch ($dp) {
            case 0:
                return "SUBJECT";
            case 1:
                return "DATA";
            case 2:
                return "SEQ";
            case 3:
                return "SEQ_ID";
            case 4:
                return "ENCODING";
            case 5:
                return "SESSION_ID";
            case 6:
                return "DOMAIN";
            case 7:
                return "CALLBACK";
            case 8:
                return "IFRAME_FUNCTION";
            case 9:
                return "ERROR";
            case 10:
                return "PUBLISH_PASSWORD";
            case 11:
                return "DOUBLE_PING";
            case 12:
                return "SUBJECT_CACHE_END";
            case 13:
                return "ENTITLEMENT_TOKEN";
            case 14:
                return "ENTITLEMENT_STATUS";
            case 15:
                return "WORKGROUP";
            case 16:
                return "ACK_SUBSCRIBE";
            case 17:
                return "PUBLICATION_RETAINED";
            case 18:
                return "PUBLICATION_QOS";
            case 19:
                return "AGENT_NAME";
            case 20:
                return "MESSAGE_TYPE";
            case 21:
                return "USER_AGENT";
            case 22:
                return "SESSION_TYPE";
            case 23:
                return "SERVER_CLIENT_PING_TIME";
            case 24:
                return "CLOSURE";
            case 25:
                return "GUARANTEED_DELIVERY";
            case 26:
                return "HISTORICAL_MESSAGES";
            case 27:
                return "REPLY_SUBJECT";
            case 28:
                return "VERSION";
            case 29:
                return "CLUSTER_TOKEN";
            case 30:
                return "MAX_MESSAGE_SIZE";
            case 31:
                return "COMPRESSION";
        }
        return "";
    }
}
class dq
{
    const dr = 0x00;
    const ds = 0x22;
    const dt = 0x0A;
    const du = 0x0D;
    const dv = 0x5C;
}
class dw
{
    public static $dx = array();
    public static $dy = array();
    public static $dz = array();
    public static $e0 = array();
    public static $e1 = array();
    public static $df = array();
    public static $e2 = array();
    const e3 = 0x19;
    const e4 = 0x7F;
    const e5 = 0x1E;
    const e6 = 0x1F;
    public static function e7()
    {
        self::$dx = array_fill(0, 128, -1);
        self::$dx[e8::e9] = 0x01;
        self::$dx[e8::ea] = 0x02;
        self::$dx[e8::eb] = 0x03;
        self::$dx[e8::ec] = 0x04;
        self::$dx[e8::ed] = 0x05;
        self::$dx[e8::ee] = 0x06;
        self::$dx[e8::ef] = 0x07;
        self::$dx[e8::eg] = 0x08;
        self::$dx[e8::eh] = 0x09;
        self::$dx[e8::ei] = 0x0B;
        self::$dx[e8::ej] = 0x0C;
        self::$dx[e8::ek] = 0x0E;
        self::$dx[e8::el] = 0x0F;
        self::$dx[e8::em] = 0x10;
        self::$dx[e8::en] = 0x11;
        self::$dx[e8::eo] = 0x12;
        self::$dx[e8::c6] = 0x13;
        self::$dx[e8::ep] = 0x14;
        self::$dx[e8::eq] = 0x1A;
        self::$dx[e8::er] = 0x07;
        self::$dx[e8::es] = 0x0B;
        self::$dy = array_fill(0, 128, -1);
        self::$dy[et::eu] = 0x01;
        self::$dy[et::ev] = 0x02;
        self::$dy[et::ew] = 0x03;
        self::$dy[et::ex] = 0x04;
        self::$dy[et::ey] = 0x05;
        self::$dy[et::ez] = 0x06;
        self::$dy[et::f0] = 0x07;
        self::$dy[et::f1] = 0x08;
        self::$dy[et::f2] = 0x09;
        self::$dy[et::f3] = 0x0B;
        self::$dy[et::f4] = 0x0C;
        self::$dy[et::f5] = 0x0F;
        self::$dy[et::f6] = 0x12;
        self::$dy[et::f7] = 0x13;
        self::$dy[et::f8] = 0x14;
        self::$dy[et::f9] = 0x15;
        self::$dy[et::fa] = 0x16;
        self::$dy[et::fb] = 0x17;
        self::$dy[et::fc] = 0x18;
        self::$dy[et::fd] = 0x1A;
        self::$dy[et::fe] = 0x27;
        self::$dy[et::ff] = 0x23;
        self::$dy[et::fg] = 0x24;
        self::$dy[et::fh] = 0x25;
        self::$dy[et::fi] = 0x10;
        self::$dy[et::fj] = 0x11;
        self::$dy[et::fk] = 0x28;
        self::$dy[et::fl] = 0x2C;
        self::$dy[et::fm] = 0x2D;
        self::$dy[et::fn] = 0x30;
        self::$dy[et::fo] = 0x1D;
        self::$dy[et::fp] = 0x26;
        self::$e1 = array_fill(0, 128, -1);
        self::fq(et::eu, fr::fs);
        self::fq(et::ev, fr::ft);
        self::fq(et::ew, fr::fu);
        self::fq(et::ex, fr::fu);
        self::fq(et::ey, fr::fu);
        self::fq(et::ez, fr::fu);
        self::fq(et::f0, fr::ft);
        self::fq(et::f1, fr::ft);
        self::fq(et::f2, fr::ft);
        self::fq(et::f3, fr::fu);
        self::fq(et::f4, fr::ft);
        self::fq(et::f5, fr::fu);
        self::fq(et::f6, fr::fs);
        self::fq(et::f7, fr::fs);
        self::fq(et::f8, fr::fs);
        self::fq(et::f9, fr::fu);
        self::fq(et::fa, fr::fu);
        self::fq(et::fb, fr::fu);
        self::fq(et::fc, fr::fu);
        self::fq(et::fd, fr::fs);
        self::fq(et::fe, fr::fs);
        self::fq(et::ff, fr::fs);
        self::fq(et::fg, fr::fu);
        self::fq(et::fh, fr::fu);
        self::fq(et::fi, fr::fs);
        self::fq(et::fj, fr::fu);
        self::fq(et::fk, fr::fu);
        self::fq(et::fl, fr::fs);
        self::fq(et::fm, fr::fu);
        self::fq(et::fn, fr::fs);
        self::fq(et::fo, fr::fu);
        self::fq(et::fp, fr::fu);
        self::$e0 = array_fill(0, 255, -1);
        self::$e0[self::e4] = 0x01;
        self::$e0[self::e5] = 0x02;
        self::$e0[self::e6] = 0x03;
        self::$e0[dq::dr] = 0x04;
        self::$e0[dq::dt] = 0x05;
        self::$e0[dq::du] = 0x06;
        self::$e0[dq::ds] = 0x07;
        self::$e0[dq::dv] = 0x08;
        self::$e0[33] = 0x09;
        self::$e0[self::e3] = 0x0B;
        self::$dz = array_fill(0, 255, -1);
        for ($i = 0; $i <= 128; $i++) {
            $e = self::fv($i);
            if ($e != -1) {
                self::$dz[$e] = $i;
            }
        }
        self::$df = array_fill(0, 128, -1);
        for ($fw = 0; $fw <= et::fp; $fw++) {
            self::$df[self::fx($fw)] = $fw;
        }
        self::$e2 = array_fill(0, 128, -1);
        for ($fw = 0; $fw <= e8::es; $fw++) {
            self::$e2[self::fy($fw)] = $fw;
        }
    }
    public static function fz($y)
    {
        $g0 = array_merge(unpack('C*', $y));
        $g1 = 0;
        for ($fw = 0; $fw < count($g0); $fw++) {
            $g2 = self::fv($g0[$fw]);
            if ($g2 != -1) {
                $g1++;
            }
        }
        if ($g1 == 0) {
            return call_user_func_array("pack", array_merge(array("C*"), $g0));
        }
        $g3 = array_fill(0, count($g0) + $g1, 0);
        for ($fw = 0, $g4 = 0; $fw < count($g0); $fw++, $g4++) {
            $g2 = self::fv($g0[$fw]);
            if ($g2 != -1) {
                $g3[$g4] = self::e6;
                $g3[$g4 + 1] = $g2;
                $g4++;
            } else {
                $g3[$g4] = $g0[$fw];
            }
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g3));
    }
    public static function g5($y)
    {
        $g0 = array_merge(unpack('C*', $y));
        $g1 = 0;
        if (count($g0) == 0) {
            return $y;
        }
        for ($fw = 0; $fw < count($g0); $fw++) {
            if ($g0[$fw] == self::e6) {
                $g1++;
            }
        }
        $g3 = array_fill(0, count($g0) - $g1, 0);
        for ($fw = 0, $g4 = 0; $fw < count($g0); $fw++, $g4++) {
            $g6 = $g0[$fw];
            if ($g6 == self::e6) {
                if ($fw + 1 < count($g0)) {
                    $g3[$g4] = self::g7($g0[$fw + 1]);
                    if ($g3[$g4] == -1) {
                        throw new \InvalidArgumentException();
                    }
                    $fw++;
                } else {
                    throw new \InvalidArgumentException();
                }
            } else {
                $g3[$g4] = $g6;
            }
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g3));
    }
    public static function g8($y, $g9, $ga)
    {
        $gb = null;
        $gc = strpos($y, chr(self::fx($g9)));
        $gd = strpos($y, chr(self::e5), $gc);
        if ($gc !== false && $gd !== false) {
            $ge = substr($y, $gc + 1, $gd - ($gc + 1));
            switch ($ga) {
                case fr::gf:
                    $gb = $ge;
                    break;
                case fr::ft:
                    $gb = $ge;
                    break;
                case fr::fs:
                    $gb = $ge;
                    break;
                case fr::fu:
                    $gb = self::gg($ge);
                    break;
            }
        }
        return $gb;
    }
    public static function gg($gh)
    {
        $y = array_merge(unpack("C*", $gh));
        $g3 = 0;
        $gi = -1;
        $gj = 0;
        $gk;
        $g6;
        $gl = count($y);
        $ab = 0;
        if ($gl == 1) {
            return $y[0];
        } else if ($gl == 2 && $y[$ab] == self::e6) {
            $g6 = self::g7($y[$ab + 1]);
            if ($g6 != -1) {
                return $g6;
            } else {
                throw new \InvalidArgumentException();
            }
        }
        for (; $gl > 0; $gl--) {
            $g6 = $y[$ab];
            $ab++;
            if ($g6 == self::e6) {
                if ($gl - 1 < 0) {
                    throw new \InvalidArgumentException();
                }
                $gl--;
                $g6 = $y[$ab];
                $ab++;
                $gk = self::g7($g6);
                if ($gk == -1) {
                    throw new \InvalidArgumentException();
                }
            } else {
                $gk = $g6;
            }
            if ($gi > 0) {
                $gj |= $gk >> $gi;
                $g3 = $g3 << 8 | ($gj >= 0 ? $gj : $gj + 256);
                $gj = ($gk << (8 - $gi));
            } else {
                $gj = ($gk << -$gi);
            }
            $gi = ($gi + 7) % 8;
        }
        return $g3;
    }
    public static function gm($gj)
    {
        if (($gj & 0xFFFFFF80) == 0) {
            $i = self::fv($gj);
            if ($i == -1) {
                return pack('C*', $gj);
            } else {
                return pack('C*', self::e6, $i);
            }
        }
        $gn = 0;
        if (($gj & 0xFF000000) != 0) {
            $gn = 24;
        } else if (($gj & 0x00FF0000) != 0) {
            $gn = 16;
        } else {
            $gn = 8;
        }
        $g3 = array_fill(0, 10, 0);
        $go = 0;
        $gp = 0;
        while ($gn >= 0) {
            $b = (($gj >> $gn) & 0xFF);
            $gp++;
            $g3[$go] |= ($b >= 0 ? $b : $b + 256) >> $gp;
            $g2 = self::fv($g3[$go]);
            if ($g2 != -1) {
                $g3[$go] = self::e6;
                $g3[$go + 1] = $g2;
                $go++;
            }
            $go++;
            $g3[$go] |= ($b << (7 - $gp)) & 0x7F;
            $gn -= 8;
        }
        $g2 = self::fv($g3[$go]);
        if ($g2 != -1) {
            $g3[$go] = self::e6;
            $g3[$go + 1] = $g2;
            $go++;
        }
        $go++;
        if ($go < count($g3)) {
            $g3 = array_slice($g3, 0, $go);
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g3));
    }
    public static function g7($b)
    {
        return $b >= 0 ? self::$dz[$b] : -1;
    }
    public static function fv($b)
    {
        return $b >= 0 ? self::$e0[$b] : -1;
    }
    public static function fx($h)
    {
        return self::$dy[$h];
    }
    public static function gq($g6)
    {
        return self::$df[$g6];
    }
    public static function fy($o)
    {
        return self::$dx[$o];
    }
    public static function dg($g6)
    {
        return self::$e2[$g6];
    }
    public static function gr()
    {
        return self::e3;
    }
    public static function fq($gs, $gt)
    {
        self::$e1[dw::fx($gs)] = $gt;
    }
    public static function gu($gs)
    {
        $gv = self::fx($gs);
        return self::$e1[$gv];
    }
}
class e8
{
    const e9 = 0;
    const ea = 1;
    const eb = 2;
    const ec = 3;
    const ed = 4;
    const ee = 5;
    const ef = 6;
    const eg = 7;
    const eo = 8;
    const eh = 9;
    const ei = 10;
    const ej = 11;
    const ek = 12;
    const el = 13;
    const en = 14;
    const em = 15;
    const c6 = 16;
    const ep = 17;
    const eq = 18;
    const er = 19;
    const es = 20;
}
class et
{
    const eu = 0;
    const ev = 1;
    const ew = 2;
    const ex = 3;
    const ey = 4;
    const ez = 5;
    const f0 = 6;
    const f1 = 7;
    const f2 = 8;
    const f3 = 9;
    const f4 = 10;
    const f5 = 11;
    const f6 = 12;
    const f7 = 13;
    const f8 = 14;
    const f9 = 15;
    const fa = 16;
    const fb = 17;
    const fc = 18;
    const fd = 19;
    const fe = 20;
    const ff = 21;
    const fg = 22;
    const fh = 23;
    const fi = 24;
    const fj = 25;
    const fk = 26;
    const fl = 27;
    const fm = 28;
    const fn = 29;
    const fo = 30;
    const fp = 31;
}
class fr
{
    const gf = 0;
    const ft = 1;
    const fs = 2;
    const fu = 3;
}
class gw
{
    const gx = "1";
    const gy = "2";
    const gz = "3";
    const h0 = "4";
}
class h1
{
    const h2 = 4;
    const h3 = 8;
}
class h4
{
    const h5 = "d";
    const h6 = "a";
}
class h7
{
	const h8 = 0;
	const h9 = 1;
	const ha = 2;
	const hb = 3;
}
dw::e7();
class hc implements c
{
	private $hd = "POST / HTTP/1.1";
	private $he = "Host: ";
	private $hf = "Content-Length: ";
	private $hg = "00000";
	private $hh = "\r\n";
	public function __construct()
	{
	}
	public function d($e)
	{
		$g = new x();
		$g->a6($this->hd);
		$g->a6($this->hh);
		$g->a6($this->he);
		$g->a6(dw::fz($e));
		$g->a6($this->hh);
		$g->a6($this->hf);
		$g->ae();
		$g->a6($this->hg);
		$g->a6($this->hh);
		$g->a6($this->hh);
		$g->af();
		return $g;
	}
	public function f($g)
	{
		$ab = $g->ap();
		$hi = strval($ab - $g->aj());
		if (strlen($hi) <= strlen($this->hg)) {
			$b0 = 0;
			for ($fw = strlen($this->hg) - strlen($hi); $fw < strlen($this->hg); $fw++) {
				$g->aa($g->ai() + $fw, $hi[$b0]);
				$b0++;
			}
		} else {
			$hj = substr($g->an(), 0, $g->ai());
			$hj .= $hi;
			$hj .= substr($g->an(), $g->ai() + strlen($this->hg));
			$g->am($hj);
		}
	}
	public function h($e, $i)
	{
		return "";
	}
}
class hk implements c
{
	private $hl = "GET /WebSocketConnection HTTP/1.1";
	private $hm = "GET /WebSocketConnection-Secure HTTP/1.1";
	private $he = "Host: ";
	private $hn = "Origin: ";
	private $ho = "Upgrade: websocket";
	private $hp = "Sec-WebSocket-Key: 23eds34dfvce4";
	private $hq = "Sec-WebSocket-Version: 13";
	private $hr = "Sec-WebSocket-Protocol: pushv1";
	private $hs = "Connection: Upgrade";
	private $hh = "\r\n";
	private $ht = 10;
	private $hu = -128;
	private $hv = -128;
	private $hw = 0x02;
	public function __construct()
	{
	}
	public function d($e)
	{
		$g = new x();
		for ($fw = 0; $fw < $this->ht; $fw++) {
			$g->a6(chr(0x00));
		}
		for ($fw = 0; $fw < 4; $fw++) {
			$hx = chr(rand(0, 100));
			$g->a6($hx);
			$g->a7($hx);
		}
		$g->ag();
		return $g;
	}
	public function f($g)
	{
		$hy = chr($this->hu) | chr($this->hw);
		$g->ah();
		$hz = $g->al() - $g->ak();
		$i0 = $this->i1($hz);
		$i2 = $this->i3($hz, $i0);
		$i4 = 0;
		if ($i0 === 1) {
			$i4 = 8;
			$g->aa($i4, $hy);
			$g->aa($i4 + 1, $i2[0] | chr($this->hv));
		} else if ($i0 === 2) {
			$i4 = 6;
			$g->aa($i4, $hy);
			$g->aa($i4 + 1, chr(126) | chr($this->hv));
			for ($fw = 0; $fw <= 1; $fw++) {
				$g->aa($i4 + 2 + $fw, $i2[$fw]);
			}
		} else {
			$g->aa($i4, $hy);
			$g->aa($i4 + 1, chr(127) | chr($this->hv));
			for ($fw = 0; $fw <= 7; $fw++) {
				$g->aa($i4 + 2 + $fw, $i2[$fw]);
			}
		}
		$g->a3($i4);
	}
	public function h($e, $i)
	{
		$g = new x();
		if (!$i) {
			$g->a6($this->hl);
		} else {
			$g->a6($this->hm);
		}
		$g->a6($this->hh);
		$g->a6($this->hn);
		$g->a6("http://" . $e);
		$g->a6($this->hh);
		$g->a6($this->he);
		$g->a6($e);
		$g->a6($this->hh);
		$g->a6($this->ho);
		$g->a6($this->hh);
		$g->a6($this->hs);
		$g->a6($this->hh);
		$g->a6($this->hp);
		$g->a6($this->hh);
		$g->a6($this->hq);
		$g->a6($this->hh);
		$g->a6($this->hr);
		$g->a6($this->hh);
		$g->a6($this->hh);
		return $g;
	}
	private function i1($i5)
	{
		if ($i5 <= 125) {
			return 1;
		} else if ($i5 <= 65535) {
			return 2;
		}
		return 8;
	}
	private function i3($ac, $i0)
	{
		$g = "";
		$i6 = 8 * $i0 - 8;
		for ($fw = 0; $fw < $i0; $fw++) {
			$i7 = $this->i8($ac, $i6 - 8 * $fw);
			$i9 = $i7 - (256 * intval($i7 / 256));
			$g .= chr($i9);
		}
		return $g;
	}
	private function i8($gj, $ia)
	{
		return ($gj % 0x100000000) >> $ia;
	}
}
class ib
{
    private $ey = h1::h3;
    private $ic = MigratoryDataClient::TRANSPORT_WEBSOCKET;
    public function __construct()
    {
    }
    public function id()
    {
        $this->ic = MigratoryDataClient::TRANSPORT_HTTP;
        $this->ey = h1::h2;
    }
    public function ie($g, $ig, $ih, $ii, $ij)
    {
        if ($this->ic == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fy(e8::eq)));
        } else {
            $g->a6(chr(dw::fy(e8::eq)) ^ $g->a8());
        }
        if (strlen($ig) > 0) {
            $g->a6($this->ik(dw::fx(et::f7), dw::fz($ig), $g));
        }
        $g->a6($this->ik(dw::fx(et::fg), dw::gm($ih), $g));
        $g->a6($this->ik(dw::fx(et::ff), dw::fz($ij), $g));
        $g->a6($this->ik(dw::fx(et::fm), dw::gm($ii), $g));
        $g->a6($this->ik(dw::fx(et::ey), dw::gm($this->ey), $g));
        if ($this->ic == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    public function il($g, $j, $im)
    {
        if ($this->ic == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fy(e8::e9)));
        } else {
            $g->a6(chr(dw::fy(e8::e9)) ^ $g->a8());
        }
        $g->a6($this->ik(dw::fx(et::eu), dw::fz($j->cz()), $g));
        if (isset($im) && $im >= 0) {
            $g->a6($this->ik(dw::fx(et::ez), dw::gm($im), $g));
        }
        $in = $j->d7();
        switch ($in) {
            case ct::cu:
                break;
            case ct::d9:
                $g->a6($this->ik(dw::fx(et::fk), dw::gm($j->d0()), $g));
                break;
            case ct::da:
                $g->a6($this->ik(dw::fx(et::ex), dw::gm($j->cx()), $g));
                $g->a6($this->ik(dw::fx(et::ew), dw::gm($j->cv() + 1), $g));
                break;
        }
        $g->a6($this->ik(dw::fx(et::ey), dw::gm($this->ey), $g));
        if ($this->ic == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    public function io($g, $im, $j)
    {
        if ($this->ic == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fy(e8::ea)));
        } else {
            $g->a6(chr(dw::fy(e8::ea)) ^ $g->a8());
        }
        $g->a6($this->ik(dw::fx(et::eu), dw::fz($j), $g));
        if ($im > 0) {
            $g->a6($this->ik(dw::fx(et::ez), dw::gm($im), $g));
        }
        $g->a6($this->ik(dw::fx(et::ey), dw::gm($this->ey), $g));
        if ($this->ic == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    public function ip($g, $im)
    {
        if ($this->ic == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fy(e8::ea)));
        } else {
            $g->a6(chr(dw::fy(e8::ea)) ^ $g->a8());
        }
        if ($im > 0) {
            $g->a6($this->ik(dw::fx(et::ez), dw::gm($im), $g));
        }
        $g->a6($this->ik(dw::fx(et::ey), dw::gm($this->ey), $g));
        if ($this->ic == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    public function iq($g, $im, $ir)
    {
        if ($this->ic == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fy(e8::es)));
        } else {
            $g->a6(chr(dw::fy(e8::es)) ^ $g->a8());
        }
        if ($im > 0) {
            $g->a6($this->ik(dw::fx(et::ez), dw::gm($im), $g));
        }
        if (strlen($ir) > 0) {
            $g->a6($this->ik(dw::fx(et::f7), dw::fz($ir), $g));
        }
        $g->a6($this->ik(dw::fx(et::ey), dw::gm($this->ey), $g));
        if ($this->ic == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    public function is($g, $bq, $it)
    {
        if ($this->ic == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fy(e8::em)));
        } else {
            $g->a6(chr(dw::fy(e8::em)) ^ $g->a8());
        }
        $g->a6($this->ik(dw::fx(et::eu), dw::fz($bq->getSubject()), $g));
        if ($bq->isCompressed()) {
            $iu = $this->iv($bq->getContent());
            if (strlen($iu) < strlen($bq->getContent())) {
                $g->a6($this->ik(dw::fx(et::ev), dw::fz($iu), $g));
            } else {
                $g->a6($this->ik(dw::fx(et::ev), dw::fz($bq->getContent()), $g));
                $bq->setCompressed(false);
            }
        } else {
            $g->a6($this->ik(dw::fx(et::ev), dw::fz($bq->getContent()), $g));
        }
        $m = $bq->getReplySubject();
        if (strlen($m) > 0) {
            $g->a6($this->ik(dw::fx(et::fl), dw::fz($m), $g));
        }
        $l = $bq->getClosure();
        if (strlen($l) > 0) {
            $g->a6($this->ik(dw::fx(et::fi), dw::fz($l), $g));
        }
        $g->a6($this->ik(dw::fx(et::ez), dw::gm($it), $g));
        if ($bq->getQos() == QoS::GUARANTEED) {
            $g->a6($this->ik(dw::fx(et::fc), dw::gm(QoS::GUARANTEED), $g));
        } else {
            $g->a6($this->ik(dw::fx(et::fc), dw::gm(QoS::STANDARD), $g));
        }
        if ($bq->isRetained() == true) {
            $g->a6($this->ik(dw::fx(et::fb), dw::gm(1), $g));
        } else {
            $g->a6($this->ik(dw::fx(et::fb), dw::gm(0), $g));
        }
        if ($bq->isCompressed()) {
            $g->a6($this->ik(dw::fx(et::fp), dw::gm(1), $g));
        }
        $g->a6($this->ik(dw::fx(et::ey), dw::gm($this->ey), $g));
        if ($this->ic == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    private function ik($gb, $y, $g)
    {
        $g3 = '';
        if ($this->ic == MigratoryDataClient::TRANSPORT_HTTP) {
            $g3 .= chr($gb);
            $g3 .= $y;
            $g3 .= chr(dw::e5);
        } else {
            $g3 .= chr($gb) ^ $g->a8();
            for ($fw = 0; $fw < strlen($y); $fw++) {
                $g3 .= $y[$fw] ^ $g->a8();
            }
            $g3 .= chr(dw::e5) ^ $g->a8();
        }
        return $g3;
    }
    public function iv($k)
    {
        $iw = gzdeflate($k);
        if ($iw === false) {
            return $k;
        }
        $ix = base64_encode($iw);
        return $ix;
    }
    public function iy($y)
    {
        $iz = base64_decode($y);
        if ($iz === false) {
            return $y;
        }
        $j0 = gzinflate($iz);
        if ($j0 === false) {
            return $y;
        }
        return $j0;
    }
}
class j1
{
    const j2 = 80;
    const j3 = 443;
    const j4 = 100;
    private $e;
    private $av;
    private $j5;
    private $j6 = self::j4;
    public function __construct($j7, $j8)
    {
        $this->j5 = $j7;
        $j9 = explode(" ", $j7, 2);
        if (count($j9) == 2) {
            $j6 = intval($j9[0]);
            if ($j6 <= 0 || $j6 > 100) {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "the weight of a cluster member must be between 0 and 100, weight: " . $j6);
            }
            $this->j6 = intval($j9[0]);
            $j7 = $j9[1];
        }
        $ja = strrpos($j7, '/');
        $jb = $ja === false ? $j7 : substr($j7, $ja + 1);
        $jc = strrpos($jb, ':');
        if ($jc !== false) {
            $this->e = substr($jb, 0, $jc);
            $this->av = intval(substr($jb, $jc + 1));
            if ($this->av < 0 || $this->av > 65535) {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $j7 . " - invalid port number");
            }
            if ($this->e === "") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "Cluster member with null address");
            }
            if ($this->e === "*") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $j7 . " - wildcard address (*) cannot be used to define a cluster member");
            }
        } else {
            $this->e = $jb;
            if ($this->e === "") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "Cluster member with null address");
            }
            if ($this->e === "*") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $j7 . " - wildcard address (*) cannot be used to define a cluster member");
            }
            if ($j8 === false) {
                $this->av = self::j2;
            } else {
                $this->av = self::j3;
            }
        }
    }
    public function jd()
    {
        return $this->e;
    }
    public function je()
    {
        return $this->av;
    }
    public function jf()
    {
        return $this->j5;
    }
    public function jg()
    {
        return $this->j6;
    }
    public function jh($ji)
    {
        if ($this->jd() === $ji->jd()) {
            if ($this->je() === $ji->je()) {
                return true;
            }
        }
        return false;
    }
    public function __toString()
    {
        return "[Host=" .
            $this->e .
            ", Port=" .
            $this->av .
            "]";
    }
}
class jj
{
    private $jk = array();
    private $jl = array();
    private $jm = null;
    public function __construct($jn, $j8)
    {
        foreach ($jn as $jo) {
            $this->jk[] = new j1($jo, $j8);
        }
    }
    public function jp()
    {
        $jq = $this->jr();
        if (count($jq) === 0) {
            $this->jl = array();
            $jq = $this->jk;
        }
        $js = $this->jt($jq);
        $this->jm = $jq[$js];
        return $this->jm;
    }
    public function ju($ji)
    {
        array_push($this->jl, $ji);
    }
    public function bg()
    {
        return $this->jm;
    }
    private function jr()
    {
        $jq = array();
        foreach ($this->jk as $ji) {
            $jv = true;
            foreach ($this->jl as $jw) {
                if ($ji->jh($jw)) {
                    $jv = false;
                }
            }
            if ($jv) {
                array_push($jq, $ji);
            }
        }
        return $jq;
    }
    private function jt($jq)
    {
        $js = -1;
        $jx = 0;
        foreach ($jq as $ji) {
            $jx = $jx + $ji->jg();
        }
        if ($jx === 0) {
            $js = floor(count($jq) * (mt_rand() / mt_getrandmax()));
        } else {
            $j6 = floor($jx * (mt_rand() / mt_getrandmax()));
            $jx = 0;
            $fw = 0;
            foreach ($jq as $ji) {
                $jx = $jx + $ji->jg();
                if ($jx > $j6) {
                    $js = $fw;
                    break;
                }
                $fw++;
            }
        }
        return $js;
    }
}
class jy extends MigratoryDataMessage
{
    public function __construct($j, $k, $s, $l = "", $n = QoS::GUARANTEED, $o = true, $m = "", $r = false)
    {
        parent::__construct($j, $k, $l, $n, $o, $m);
        $this->s = $s;
        $this->r = $r;
    }
    public function cw($p)
    {
        $this->p = $p;
    }
    public function cv()
    {
        return $this->p;
    }
    public function jz($q)
    {
        $this->q = $q;
    }
    public function k0()
    {
        return $this->q;
    }
}
class v
{
    const k1 = "NOT_SUBSCRIBED";
    const k2 = "OK";
    const k3 = "FAILED";
    const k4 = "DENY";
    const bd = "connection_passive_close";
    const k5 = "connection_active_close_keep_alive";
    const k6 = "connection_active_close_seq_higher";
    const bi = "connection_error";
    const cr = "cache_ok";
    const k7 = "cache_ok_no_new_message";
    const k8 = "cache_ok_new_epoch";
    const k9 = "no_cache";
    const ka = "no_seq";
    const kb = "end";
    const kc = '/^\/([^\/]+\/)*([^\/]+|\*)$/';
    const kd = "\r\n\r\n";
    const hf = "Content-Length: ";
    public static function ke($ge)
    {
        return preg_match(self::kc, $ge);
    }
    public static function kf($kg)
    {
        $kh = array();
        foreach ($kg as $j) {
            if (isset($j) && v::ke($j)) {
                array_push($kh, $j);
            }
        }
        return $kh;
    }
    public static function ki($kj, $kk, $kl, $km, $az)
    {
        // different epoch, reset and continue.
        if ($kj->cx() !== $kl) {
            $kj->cw($kk);
            $kj->cy($kl);
            return kn::ko;
        }
        // if received seq is equal or smaller than the local seq then the message is ignored
        if ($kk <= $kj->cv()) {
            return kn::kp;
        }
        // if received seq is +1 than the local seq then the message is processed
        if ($kk === ($kj->cv() + 1)) {
            if ($kj->cs() == ct::da) {
                $kj->db();
                $km->onStatus(MigratoryDataClient::NOTIFY_DATA_SYNC, $kj->cz());
                $az->br(by::c4 . MigratoryDataClient::NOTIFY_DATA_SYNC . $kj);
            }
            $kj->cw($kj->cv() + 1);
            return kn::ko;
        }
        // there is a hole in the order of the messages
        // if there is a missing message when the session is active, then we disconnect the client and make failover.
        if ($kj->cp() > 0) {
            $az->br("Missing messages: expected message with sequence number: " . ($kj->cv() + 1) . ", received instead message with sequence number:  " . $kk . " !");
            return kn::kq;
        }
        $az->br("Reset sequence: '" . ($kj->cv() + 1) . "'. The new sequence is: '" . $kk . "' !");
        $kj->cw($kk);
        $km->onStatus(MigratoryDataClient::NOTIFY_DATA_RESYNC, $kj->cz());
        $az->br(by::c4 . MigratoryDataClient::NOTIFY_DATA_RESYNC . " " . $kj);
        return kn::ko;
    }
    public static function kr($kj, $kk, $kl, $km, $az)
    {
        // different epoch, reset and continue.
        if ($kj->cx() !== $kl) {
            $kj->cw($kk);
            $kj->cy($kl);
            return kn::ko;
        }
        // if received seq is equal or smaller than the local seq then the message is ignored
        if ($kk <= $kj->cv()) {
            return kn::kp;
        }
        if ($kj->cs() == ct::da) {
            $kj->db();
        }
        $kj->cw($kk);
        return kn::ko;
    }
    public static function ks($kt)
    {
        $ku = "";
        if (count($kt) > 0) {
            $ku .= "[";
            for ($fw = 0; $fw < count($kt); $fw++) {
                $ku .= $kt[$fw];
                if ($fw + 1 != count($kt)) {
                    $ku .= ", ";
                }
            }
            $ku .= "]";
        }
        return $ku;
    }
    public static function w($kv)
    {
        if ($kv) {
            return "true";
        }
        return "false";
    }
}
class kw
{
    private $kx = array();
    public function ky($kg, $cl)
    {
        foreach ($kg as $j) {
            if (!array_key_exists($j, $this->kx)) {
                $kj = new cj($j, $cl);
                $this->kx[$j] = $kj;
            }
        }
    }
    public function kz($kg)
    {
        $l0 = array();
        foreach ($kg as $j) {
            if (array_key_exists($j, $this->kx)) {
                unset($this->kx[$j]);
                array_push($l0, $j);
            }
        }
        return $l0;
    }
    public function l1()
    {
        return array_keys($this->kx);
    }
    public function cz($j)
    {
        if (array_key_exists($j, $this->kx)) {
            return $this->kx[$j];
        }
        return null;
    }
    public function l2($j)
    {
        return array_key_exists($j, $this->kx);
    }
    public function l3()
    {
        $l4 = array_values($this->kx);
        foreach ($l4 as $l5) {
            $l5->dc();
        }
    }
}
class l6
{
    private $l7;
    private $l8;
    public function __construct($l7, $l8)
    {
        $this->l7 = $l7;
        $this->l8 = $l8;
    }
    public function l9()
    {
        return $this->l7;
    }
    public function la()
    {
        return $this->l8;
    }
}
class lb
{
    public static function lc($g)
    {
        $ld = lb::le($g, 0);
        $ab = $ld->l9();
        if ($g->ap() < $ld->la()) {
            $ab = -1;
        }
        if ($ab === -1) {
            return $ab;
        }
        while (ord($g->ad($ab)) === dw::e4) {
            $ab++;
        }
        return $ab;
    }
    public static function le($g, $a3)
    {
        $lf = new l6(-1, -1);
        if ($a3 == $g->ap()) {
            return $lf;
        }
        $ab = $a3;
        $lg = 2;
        $lh = 0;
        $li = 0;
        $lj = $g->ap() - $ab;
        if ($lj < $lg) {
            return $lf;
        }
        $g6 = dw::gg($g->ad($ab));
        $hy = ($g6 >> 7) & 0x01;
        $lk = $g6 & 0x40;
        $ll = $g6 & 0x20;
        $lm = $g6 & 0x10;
        if ($hy !== 1 || $lk != 0 || $ll != 0 || $lm != 0) {
            return $lf;
        }
        $ab++;
        $g6 = dw::gg($g->ad($ab));
        $ln = $g6 & 0x7F;
        if ($ln < 126) {
            $li = 0;
            $lh = $ln;
        } else if ($ln === 126) {
            $li = 2;
            if ($lj < $lg + $li) {
                return $lf;
            }
            $lo = "";
            for ($fw = $ab + 1; $fw <= $ab + $li; $fw++) {
                $lo .= $g->ad($fw);
            }
            $lh = lb::lp($lo);
            $ab += $li;
        } else {
            $li = 8;
            if ($lj < $lg + $li) {
                return $lf;
            }
            $lo = "";
            for ($fw = $ab + 1; $fw <= $ab + $li; $fw++) {
                $lo .= $g->ad($fw);
            }
            $lh = lb::lp($lo);
            $ab += $li;
        }
        if ($lj < ($lg + $li + $lh)) {
            return $lf;
        }
        $ab += 1;
        return new l6($ab, $ab + $lh);
    }
    private static function lp($y)
    {
        if (strlen($y) === 2) {
            return (ord($y[0] & chr(0xFF)) << 8) | ord($y[1] & chr(0xFF));
        } else {
            $lq = ord($y[4] & chr(0x7F)) << 24;
            $lr = ord($y[5] & chr(0xFF)) << 16;
            $ls = ord($y[6] & chr(0xFF)) << 8;
            $lt = ord($y[7] & chr(0xFF));
            $lu = $lq | $lr | $ls | $lt;
            return $lu;
        }
    }
}
class lv
{
    public static function lw($g)
    {
        $lx = $g->a9();
        if ($g->ad($lx) == "H") {
            $lx = self::ly($g);
        }
        if ($lx == -1) {
            return array();
        }
        $g->a3($lx);
        $lz = array();
        while (true) {
            if ($lx >= $g->ap()) {
                return $lz;
            }
            if (dw::gg($g->ad($lx)) == dw::gr()) {
                $lx++;
            } else {
                $ld = lb::le($g, $lx);
                $m0 = $ld->l9();
                $m1 = $ld->la();
                if ($m0 == -1) {
                    return $lz;
                }
                while (true) {
                    $fw = self::m2($g, $m0, $m1, chr(dw::e4));
                    if ($fw == -1) {
                        break;
                    }
                    $df = self::m3($g, $m0 + 1, $fw);
                    if ($df != null) {
                        $m4 = new dd(dw::dg(ord($g->ad($m0))), $df);
                        array_push($lz, $m4);
                    }
                    $m0 = $fw + 1;
                    $g->a3($m0);
                }
                $lx = $g->a9();
            }
        }
    }
    public static function m5($g)
    {
        $lx = lv::m6($g);
        if ($lx == -1) {
            return array();
        }
        $g->a3($lx);
        $lz = array();
        $ab = $g->a9();
        while (true) {
            $fw = self::m2($g, $ab, $g->ap(), chr(dw::e4));
            if ($fw == -1) {
                break;
            }
            $m7 = $g->ad($ab);
            if ($m7 == "H") {
                $m8 = lv::m5($g);
                foreach ($m8 as $m9) {
                    array_push($lz, $m9);
                }
                break;
            }
            $df = lv::m3($g, $ab + 1, $fw);
            $m4 = new dd(dw::dg(ord($g->ad($ab))), $df);
            array_push($lz, $m4);
            $ab = $fw + 1;
            $g->a3($ab);
        }
        return $lz;
    }
    public static function m3($g, $l7, $l8)
    {
        $df = null;
        while (true) {
            if ($l7 >= $l8) {
                break;
            }
            $gs = ord($g->ad($l7));
            $ma = self::m2($g, $l7 + 1, $l8, chr(dw::e5));
            if ($ma == -1) {
                return null;
            }
            $gb = dw::gq($gs);
            if ($gb === null) {
                $l7 = $ma + 1;
                continue;
            }
            $l7++;
            if ($df == null) {
                $df = array();
            }
            $ac = null;
            $mb = substr($g->an(), $l7, $ma - $l7);
            switch (dw::gu($gb)) {
                case fr::fu:
                    $ac = dw::gg($mb);
                    break;
                case fr::fs:
                    $ac = dw::g5($mb);
                    break;
                case fr::ft:
                    $ac = dw::g5($mb);
                    break;
                case fr::gf:
                    $ac = $mb;
                    break;
            }
            if (!array_key_exists($gb, $df)) {
                $df[$gb] = $ac;
            } else {
                $mc = $df[$gb];
                if (is_array($mc)) {
                    array_push($mc, $ac);
                } else {
                    $md = array();
                    array_push($md, $mc);
                    array_push($md, $ac);
                    $df[$gb] = $md;
                }
            }
            $l7 = $ma + 1;
        }
        return $df;
    }
    public static function m6($g)
    {
        $me = $g->a9();
        $y = $g->ao();
        $mf = dw::fz(v::hf);
        $ab = lv::mg($mf, $y);
        if ($ab == -1) {
            return -1;
        }
        $ab += strlen($mf);
        $mh = "\r";
        $mi = lv::m2($g, $ab, $g->ap(), $mh);
        if ($mi == -1) {
            return -1;
        }
        $mj = substr($y, $ab, $mi - $ab);
        $mk = intval($mj);
        $ab = lv::mg(v::kd, $y);
        if ($ab == -1) {
            return $ab;
        }
        $ab += strlen(v::kd);
        if (($ab + $mk) > strlen($y)) {
            return -1;
        }
        return $me + $ab;
    }
    private static function m2($g, $l7, $l8, $ml)
    {
        for ($fw = $l7; $fw < $l8; $fw++) {
            $x = $g->ad($fw);
            if ($g->ad($fw) == $ml) {
                return $fw;
            }
        }
        return -1;
    }
    private static function mg($mm, $mn)
    {
        $m9 = strlen($mm);
        $ia = strlen($mn);
        $mo = array_fill(0, $m9, 0);
        lv::mp($mm, $m9, $mo);
        $fw = 0;
        $g4 = 0;
        while ($fw < $ia) {
            if ($mm[$g4] == $mn[$fw]) {
                $g4++;
                $fw++;
            }
            if ($g4 == $m9) {
                return $fw - $g4;
            } else if ($fw < $ia && $mm[$g4] != $mn[$fw]) {
                if ($g4 != 0)
                    $g4 = $mo[$g4 - 1];
                else
                    $fw = $fw + 1;
            }
        }
        return -1;
    }
    private static function mp($mm, $m9, &$mo)
    {
        $gl = 0;
        $mo[0] = 0;
        $fw = 1;
        while ($fw < $m9) {
            if ($mm[$fw] == $mm[$gl]) {
                $gl++;
                $mo[$fw] = $gl;
                $fw++;
            } else {
                if ($gl != 0) {
                    $gl = $mo[$gl - 1];
                } else {
                    $mo[$fw] = 0;
                    $fw++;
                }
            }
        }
    }
    private static function ly($g)
    {
        $mq = "\r\n\r\n";
        $ab = $g->a9();
        $fw = self::mg($mq, $g->ao());
        if ($fw == -1) {
            return -1;
        }
        $ab = $fw + strlen($mq);
        return $ab;
    }
}
class Version
{
        //      6       mr   xx   mr xxx
    // push version mr API ID mr API version
    // ex: for Java with API ID 00 and version 001 => 600001
    // ex: for C# with API ID 02 and version 006 => 602006
    // Java - 00
    // Javascript Legacy - 01
    // C# - 02
    // C++ - 03
    // iOS - 04
    // Python - 05
    // PHP Pub - 06
    // PHP React - 07
    // NodeJS - 08
    // Javascript-Browser - 09
    // Android - 10
	const VERSION = 6;
}
class ms
{
    private $b0 = null;
    private $e = null;
    private $mt = null;
    private $aw = null;
    private $km = null;
    private $mu = false;
    private $mv = false;
    private $ax = null;
    private $mw = mx::my;
    private $mz = null;
    private $n0 = null;
    private $n1 = null;
    private $im = -1;
    private $n2 = false;
    private $n3 = 0;
    private $n4 = false;
    private $n5 = 0;
    private $n6 = n7::n8;
    private $n9 = null;
    private $na = null;
    private $nb = array();
    private $nc = null;
    private $nd;
    private $az = null;
    public function __construct($ne, $mt, $aw, $km, $az)
    {
        $this->b0 = $ne;
        $this->mt = $mt;
        $this->aw = $aw;
        $this->km = $km;
        $this->az = $az;
        $this->ax = new nf($this->b0, $this);
        $this->nd = new kw();
        $this->n0 = new ib();
        if ($ne->ng() === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            $this->mz = new hk();
        } else {
            $this->mz = new hc();
            $this->n0->id();
        }
    }
    public function nh()
    {
        $this->nc = uniqid();
        $ni = $this->mt->jp();
        $this->az->be("Connecting to the cluster member: " . $ni . ", using API version: " . Version::VERSION);
        $this->n1 = new at($this, $ni->jd(), $ni->je(), $this->ax, $this->nc, $this->az);
        $this->n1->b5();
    }
    public function ba()
    {
        if ($this->b0->ng() !== MigratoryDataClient::TRANSPORT_HTTP) {
            $g = $this->mz->h($this->mt->bg()->jd(), $this->b0->b9());
            $this->n1->bj($g->ao());
        }
        $this->ax->nj($this->nc, nk::eq);
        $this->ax->nl();
        $this->nm();
    }
    public function nm()
    {
        $g = $this->mz->d($this->mt->bg()->jd());
        $this->n0->ie($g, $this->b0->nn(), $this->b0->no(), $this->b0->np(), $this->b0->nq());
        $this->mz->f($g);
        $this->n1->bj($g->ao());
    }
    public function bc($ay, $nr, $ns)
    {
        if ($ay === $this->nc) {
            $this->mu = false;
            $this->az->br(by::c3 . $this->nc . " " . $ns);
            $this->nt();
            $this->nu();
            $this->ax->bc($this->nc, v::bd);
        }
    }
    public function nv($kg, $cl)
    {
        if (!isset($kg) || count($kg) == 0) {
            return;
        }
        $kg = v::kf($kg);
        $nw = array_diff($kg, $this->nd->l1());
        if (count($nw) == 0) {
            return 0;
        }
        $this->nd->ky($nw, $cl);
        if ($this->mu) {
            $this->nx($nw);
        }
    }
    private function nx($kg)
    {
        $g = $this->mz->d($this->mt->bg()->jd());
        foreach ($kg as $j) {
            $this->ny($g, $this->nd->cz($j));
        }
        $this->mz->f($g);
        $this->n1->bj($g->ao());
    }
    private function ny($g, $j)
    {
        $this->n0->il($g, $j, $this->im);
    }
    public function nz($kg)
    {
        if (!isset($kg) || count($kg) == 0) {
            return;
        }
        $o0 = array_intersect($kg, $this->nd->l1());
        if (count($o0) == 0) {
            return;
        }
        $l0 = $this->nd->kz($o0);
        if ($this->mu) {
            $this->o1($l0);
        }
    }
    private function o1($kg)
    {
        $g = $this->mz->d($this->mt->bg()->jd());
        foreach ($kg as $j) {
            $this->n0->io($g, $this->im, $j);
        }
        $this->mz->f($g);
        $this->n1->bj($g->ao());
    }
    public function o2()
    {
        $this->nt();
        if ($this->mw == mx::o3) {
            return;
        }
        $this->mt->ju($this->mt->bg());
        $this->mv = true;
        $this->nh();
    }
    public function nt()
    {
        $this->ax->o4();
        $this->dc();
        if (isset($this->n1)) {
            $this->n1->bk();
        }
        $this->n1 = null;
    }
    private function dc()
    {
        $this->mu = false;
        $this->im = -1;
        $this->n4 = false;
    }
    public function o5()
    {
        $this->mw = mx::o3;
        $this->nt();
    }
    public function o6($ir) {
        $g = $this->mz->d($this->mt->bg()->jd());
        $this->n0->iq($g, $this->im, $ir);
        $this->mz->f($g);
        $this->n1->bj($g->ao());        
    }
    public function o7($bq)
    {
        if (!$this->mu) {
            $this->o8(MigratoryDataClient::NOTIFY_PUBLISH_FAILED, $bq);
            return;
        }
        $this->o9($bq);
    }
    public function o9($bq)
    {
        $m = $bq->getReplySubject();
        if (strlen($m) > 0 && v::ke($m) && !$this->nd->l2($m)) {
            $this->nv(array($m), 0);
        }
        $g = $this->mz->d($this->mt->bg()->jd());
        $this->n0->is($g, $bq, $this->im);
        $this->mz->f($g);
        if (isset($this->na) && ($g->ap() - $g->a9()) > $this->na) {
            $this->o8(MigratoryDataClient::NOTIFY_MESSAGE_SIZE_LIMIT_EXCEEDED, $bq);
            return;
        }
        $l = $bq->getClosure();
        if (isset($l) && strlen($l) > 0) {
            array_push($this->nb, $l);
        }
        $this->n1->bj($g->ao());
    }
    public function nu()
    {
        foreach ($this->nb as $l) {
            $this->az->br(by::c7 . $l);
            $this->km->onStatus(MigratoryDataClient::NOTIFY_PUBLISH_FAILED, $l);
        }
        $this->nb = array();
    }
    public function oa()
    {
        $g = $this->mz->d($this->mt->bg()->jd());
        $this->n0->ip($g, $this->im);
        $this->mz->f($g);
        $this->n1->bj($g->ao());
    }
    public function o8($ob, $bq)
    {
        if (isset($bq) && strlen($bq->getClosure()) > 0) {
            $this->km->onStatus($ob, $bq->getClosure());
        }
    }
    public function oc()
    {
        if ($this->mw != mx::my) {
            return;
        }
        $this->az->be("Call pause");
        $this->mw = mx::od;
        $this->nt();
    }
    public function oe()
    {
        if ($this->mw != mx::od) {
            return;
        }
        $this->az->be("Call resume");
        $this->mw = mx::my;
        $this->of();
        $this->o2();
    }
    public function b3()
    {
        return $this->aw;
    }
    public function og()
    {
        return $this->az;
    }
    public function bf()
    {
        return $this->mt;
    }
    public function bh()
    {
        return $this->nc;
    }
    public function oh($oi)
    {
        $this->nc = $oi;
    }
    public function oj()
    {
        return $this->mu;
    }
    public function ok()
    {
        return $this->n5;
    }
    public function ol()
    {
        $this->n5++;
        return $this->n5;
    }
    public function om($mu)
    {
        $this->mu = $mu;
    }
    public function on()
    {
        return $this->mw;
    }
    public function b4()
    {
        return $this->b0;
    }
    public function bb($g)
    {
        if ($this->b0->ng() === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            $lz = lv::lw($g);
        } else {
            $lz = lv::m5($g);
        }
        if (count($lz) > 0) {
            $this->oo($lz);
        } else {
            $this->az->br(by::c0);
            $this->ax->nj($this->nc, nk::op);
        }
    }
    private function oo($lz)
    {
        foreach ($lz as $bq) {
            switch ($bq->dg()) {
                case e8::eb:
                case e8::eh:
                case e8::c6:
                case e8::eg:
                case e8::eq:
                case e8::e9:
                case e8::ea:
                case e8::er:
                    $this->az->br(by::bz . " " . $bq);
                    $this->oq($bq);
                    break;
                case e8::ec:
                    $this->az->br(by::c0);
                    $this->ax->nj($this->nc, nk::op);
                    break;
                case e8::em:
                    break;
                default:
                    $this->az->bs("No existing opeartion for message: " . $bq);
            }
        }
    }
    private function oq($bq)
    {
        $this->ax->nj($this->nc, nk::op);
        $df = $bq->dh();
        switch ($bq->dg()) {
            case e8::eb:
                $this->os($df);
                break;
            case e8::e9:
                $this->ot($df);
                break;
            case e8::eq:
                $this->ou($df);
                break;
            case e8::ea:
                $this->ov($df);
                break;
            case e8::eh:
                $this->ow($df);
                break;
            case e8::c6:
                $this->ox($df);
                break;
            case e8::eg:
                $this->oy($df);
                break;
            case e8::er:
                $this->oz($df);
                break;    
            default:
                $this->az->bs("No existing opeartion for message: " . $bq);
        }
    }
    private function os($df)
    {
        if (array_key_exists(et::eu, $df)) {
            $j = $df[et::eu];
            $kj = $this->nd->cz($j);
            if (!isset($kj)) {
                return;
            }
        }
        if (array_key_exists(et::fn, $df)) {
            $p0 = $df[et::fn];
            $this->p1($p0);
        }
        if (array_key_exists(et::ev, $df)) {
            $y = $df[et::ev];
        }
        $o = false;
        if (array_key_exists(et::fb, $df)) {
            $p2 = $df[et::fb];
            if ($p2 === 1) {
                $o = true;
            }
        }
        $r = false;
        if (array_key_exists(et::fp, $df)) {
            $p3 = $df[et::fp];
            if ($p3 === 1) {
                $r = true;
            }
        }
        if ($r) {
            $y = $this->n0->iy($y);
        }
        $p4 = MessageType::UPDATE;
        if (array_key_exists(et::fe, $df)) {
            $s = $df[et::fe];
            switch ($s) {
                case gw::gx:
                    $p4 = MessageType::SNAPSHOT;
                    break;
                case gw::gz:
                    $p4 = MessageType::RECOVERED;
                    break;
                case gw::h0:
                    $p4 = MessageType::HISTORICAL;
                    break;
            }
        }
        $n = QoS::GUARANTEED;
        if (array_key_exists(et::fc, $df)) {
            $p5 = $df[et::fc];
            if ($p5 === QoS::STANDARD) {
                $n = QoS::STANDARD;
            }
        }
        $l = "";
        if (array_key_exists(et::fi, $df)) {
            $l = $df[et::fi];
        }
        $m = "";
        if (array_key_exists(et::fl, $df)) {
            $m = $df[et::fl];
        }
        if ($this->n6 == n7::p6 && $n == QoS::GUARANTEED) {
            $p7 = new jy($j, $y, $p4, $l, $n, $o, $m, $r);
            if (array_key_exists(et::ew, $df)) {
                $p = $df[et::ew];
            }
            if (array_key_exists(et::ex, $df)) {
                $cm = $df[et::ex];
            }
            $p7->cw($p);
            $p7->jz($cm);
            $p8 = v::ki($kj, $p, $cm, $this->km, $this->az);
            if ($p8 == kn::ko) {
                $this->az->br(by::c4 . $p7);
                $this->km->onMessage($p7);
            } else if ($p8 == kn::kq) {
                $this->bc($this->nc, v::k6, "seq_higher");
            }
        } else if ($this->n6 == n7::p9 && $n == QoS::GUARANTEED) {
            $p7 = new jy($j, $y, $p4, $l, $n, $o, $m, $r);
            if (array_key_exists(et::ew, $df)) {
                $p = $df[et::ew];
            }
            if (array_key_exists(et::ex, $df)) {
                $cm = $df[et::ex];
            }
            $p7->cw($p);
            $p7->jz($cm);
            $p8 = v::kr($kj, $p, $cm, $this->km, $this->az);
            if ($p8 == kn::ko) {
                $this->az->br(by::c4 . $p7);
                $this->km->onMessage($p7);
            }            
        } else {
            $p7 = new jy($j, $y, $p4, "", $n, $o, $m, $r);
            $this->az->br(by::c4 . $p7);
            $this->km->onMessage($p7);
        }
    }
    private function ot($df)
    {
    }
    private function oz($df) {
        $d5 = $df[et::f8];
        $be = $df[et::f7];
        $this->km->onStatus($d5, $be);
    }
    private function ou($df)
    {
        if (array_key_exists(et::ez, $df)) {
            $im = $df[et::ez];
            $this->pa();
            $this->im = $im;
            $this->n4 = true;
            $this->n5 = 0;
            if (array_key_exists(et::fj, $df)) {
                $pb = $df[et::fj];
                if ($pb == 1) {
                    $this->n6 = n7::p6;
                } else if ($pb == 2) {
                    $this->n6 = n7::p9;
                }
            }
            if (array_key_exists(et::fh, $df)) {
                $pc = $df[et::fh];
                $this->ax->pd($pc);
                $this->ax->nj($this->nc, nk::op);
            }
            $this->mu = true;
            if (array_key_exists(et::fn, $df)) {
                $p0 = $df[et::fn];
                $this->p1($p0);
            }
            if (array_key_exists(et::fo, $df)) {
                $this->na = $df[et::fo];
            }
            $pe = "";
            if (array_key_exists(et::f8, $df)) {
                $pe = $df[et::f8];
            }
            $pf = MigratoryDataClient::NOTIFY_CONNECT_OK;
            if (array_key_exists(et::f3, $df)) {
                $bt = $df[et::f3];
                if ($bt == h7::hb) {
                    $pf = MigratoryDataClient::NOTIFY_CONNECT_DENY;
                }
            }
            $this->km->onStatus($pf, $pe);
            $kg = $this->nd->l1();
            if (count($kg)) {
                $this->nx($kg);
            }
        }
    }
    private function of()
    {
        $this->n2 = false;
        $this->n3 = 0;
    }
    private function pa()
    {
        $this->az->be("Connected to cluster member: " . $this->mt->bg());
        $this->of();
        $this->az->br(by::c1 . MigratoryDataClient::NOTIFY_SERVER_UP . " " . $this->nc);
        $this->km->onStatus(MigratoryDataClient::NOTIFY_SERVER_UP, $this->mt->bg()->jf());
    }
    public function pg($ph)
    {
        $this->az->bt("[" . $ph . "] [" . $this->mt->bg() . "]");
        $this->az->be("Lost connection with the cluster member: " . $this->mt->bg());
        if (!$this->n4) {
            $this->n3++;
            if (!$this->n2) {
                if ($this->n3 >= $this->b0->pi()) {
                    $this->az->br(by::c2 . $ph);
                    $this->n2 = true;
                    $this->km->onStatus(MigratoryDataClient::NOTIFY_SERVER_DOWN, $this->mt->bg()->jf());
                }
            }
        }
    }
    private function p1($p0)
    {
        if (isset($this->n9)) {
            if ($p0 !== $this->n9) {
                $this->n9 = $p0;
                // reset epoch and seq
                $this->nd->l3();
            }
        } else {
            $this->n9 = $p0;
        }
    }
    private function ov($df)
    {
    }
    private function ow($df)
    {
        if (array_key_exists(et::f8, $df)
            && array_key_exists(et::eu, $df)) {
            $pj = $df[et::f8];
            $j = $df[et::eu];
            $pk = true;
            $pl = MigratoryDataClient::NOTIFY_SUBSCRIBE_DENY;
            if ($pj == h4::h6) {
                $pl = MigratoryDataClient::NOTIFY_SUBSCRIBE_ALLOW;
                $pk = false;
            } else if ($pj == h4::h5) {
                $pl = MigratoryDataClient::NOTIFY_SUBSCRIBE_DENY;
            }
            if ($pk) {
                $this->nd->kz(array($j));
            }
            $this->az->br(by::c8 . $j . " " . $pj . " " . $pl);
            $this->km->onStatus($pl, $j);
        }
    }
    private function ox($df)
    {
        if (!isset($df)) {
            return;
        }
        if (array_key_exists(et::fi, $df)
            && array_key_exists(et::f8, $df)) {
            $l = $df[et::fi];
            $pm = $df[et::f8];
            $d5 = MigratoryDataClient::NOTIFY_PUBLISH_FAILED;
            if ($pm == v::k4) {
                $d5 = MigratoryDataClient::NOTIFY_PUBLISH_DENIED;
            } else if ($pm == v::k2) {
                $d5 = MigratoryDataClient::NOTIFY_PUBLISH_OK;
            }
            $this->az->br(by::c6 . $d5 . " " . $l);
            $this->km->onStatus($d5, $l);
            $i5 = count($this->nb);
            for ($fw = 0; $fw < $i5; $fw++) {
                if ($l === $this->nb[$fw]) {
                    unset($this->nb[$fw]);
                }
            }
            $this->nb = array_values($this->nb);
        }
    }
    private function oy($df)
    {
        $j = "";
        if (array_key_exists(et::eu, $df)) {
            $j = $df[et::eu];
        }
        if (array_key_exists(et::fe, $df)) {
            $d5 = $df[et::fe];
        }
        $this->az->br("Recovery status for subject: " . $j . " is " . $d5);
        if (v::kb == $d5) {
            $kg = $this->nd->l1();
            foreach ($kg as $j) {
                $kj = $this->nd->cz($j);
                $pn = $kj->d6();
                if (v::cr === $pn ||
                    v::k8 === $pn ||
                    v::k7 === $pn) {
                    $kj->d3();
                } else {
                    $kj->d1();
                }
            }
        } else {
            $kj = $this->nd->cz($j);
            if (isset($kj)) {
                $kj->d4($d5);
            }
        }
    }
}
class kn
{
    const ko = 0;
    const kp = 1;
    const kq = 2;
}
class nk
{
    const eq = 0;
    const op = 1;
}
class mx
{
    const o3 = 0;
    const od = 1;
    const my = 2;
}
class n7
{
    const n8 = 0;
    const p6 = 1;
    const p9 = 2;
}
class po
{
    const pp = 30;
    const pq = 900;
    const pr = 10;
    private $ps = 3;
    private $pt = MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF;
    private $pu = 20;
    private $pv = 360;
    private $pw = 5;
    private $fm = Version::VERSION;
    private $ih;
    private $ij;
    private $j8 = false;
    private $px = 1;
    private $ir = "";
    private $py = 1000;
    private $ic = MigratoryDataClient::TRANSPORT_WEBSOCKET;
    private $kg = array();
    public function __construct($ih, $ij)
    {
        $this->ih = $ih;
        $this->ij = $ij;
    }
    public function pz($kg, $cl)
    {
        foreach ($kg as $j) {
            $this->kg[$j] = $cl;
        }
    }
    public function kz($kg)
    {
        foreach ($kg as $j) {
            if (array_key_exists($j, $this->kg)) {
                unset($this->kg[$j]);
            }
        }
    }
    public function q0()
    {
        return $this->kg;
    }
    public function np()
    {
        return $this->fm;
    }
    public function no()
    {
        return $this->ih;
    }
    public function q1($j8)
    {
        $this->j8 = $j8;
    }
    public function b9()
    {
        return $this->j8;
    }
    public function q2($ir)
    {
        $this->ir = $ir;
    }
    public function nn()
    {
        return $this->ir;
    }
    public function q3($ic)
    {
        $this->ic = $ic;
    }
    public function ng()
    {
        return $this->ic;
    }
    public function q4($ps)
    {
        $this->ps = $ps;
    }
    public function q5()
    {
        return $this->ps;
    }
    public function q6()
    {
        return $this->pt;
    }
    public function q7($pt)
    {
        $this->pt = $pt;
    }
    public function q8()
    {
        return $this->pu;
    }
    public function q9($pu)
    {
        $this->pu = $pu;
    }
    public function qa()
    {
        return $this->pw;
    }
    public function qb($pw)
    {
        $this->pw = $pw;
    }
    public function pi()
    {
        return $this->px;
    }
    public function qc($px)
    {
        $this->px = $px;
    }
    public function qd()
    {
        return $this->pv;
    }
    public function qe($pv)
    {
        $this->pv = $pv;
    }
    public function nq()
    {
        return $this->ij;
    }
    public function b7()
    {
        return $this->py;
    }
    public function qf($py)
    {
        $this->py = $py;
    }
}
class nf
{
    private $qg = null;
    private $qh = null;
    private $qi = null;
    private $b0;
    private $au;
    private $qj = po::pp;
    public function __construct($ne, $au)
    {
        $this->b0 = $ne;
        $this->au = $au;
    }
    public function nj($oi, $qk)
    {
        if (isset($this->qg)) {
            $this->au->b3()->cancelTimer($this->qg);
        }
        $ql = $this->qj;
        if ($qk == nk::eq) {
            $qm = $this->au->ok();
            $ql = $this->qn($qm, true);
        }
        if ($ql > 0) {
            $this->qg = $this->au->b3()->addTimer($ql, function () use ($oi) {
                $nc = $this->au->bh();
                if (!isset($nc) || $nc !== $oi) {
                    return;
                }
                $this->au->om(false);
                $this->au->nt();
                $this->au->nu();
                $this->bc($nc, v::k5);
            });
        }
    }
    public function bc($oi, $ph)
    {
        if ($this->au->on() != mx::my) {
            return;
        }
        $nc = $this->au->bh();
        if (!isset($nc) || $nc !== $oi) {
            return;
        }
        $this->au->oh(null);
        $this->au->pg($ph);
        $qm = $this->au->ol();
        $ql = $this->qn($qm, false);
        $this->qo($ql, $ph);
    }
    public function qo($qp, $ph)
    {
        if (isset($this->qi)) {
            $this->au->b3()->cancelTimer($this->qi);
        }
        $this->qi = $this->au->b3()->addTimer($qp, function () use ($ph) {
            $this->au->o2();
        });
    }
    public function pd($ac)
    {
        $this->qj = $ac * 1.4;
    }
    public function nl()
    {
        if (isset($this->qh)) {
            $this->au->b3()->cancelTimer($this->qh);
        }
        $this->qh = $this->au->b3()->addTimer(po::pq, function () {
            $this->au->oa();
            $this->nl();
        });
    }
    public function o4()
    {
        if (isset($this->qg)) {
            $this->au->b3()->cancelTimer($this->qg);
        }
        if (isset($this->qh)) {
            $this->au->b3()->cancelTimer($this->qh);
        }
        if (isset($this->qi)) {
            $this->au->b3()->cancelTimer($this->qi);
        }
    }
    private function qn($qm, $qq)
    {
        $ql = $this->qj;
        if ($qm > 0) {
            if ($qm <= $this->b0->q5()) {
                $ql = ($qm * $this->b0->qa()) - floor((mt_rand() / mt_getrandmax()) * $this->b0->qa());
            } else {
                if ($this->b0->q6() === MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF) {
                    $qr = $qm - $this->b0->q5();
                    $ql = min(($this->b0->q8() * (2 ** $qr)) - floor((mt_rand() / mt_getrandmax()) * $this->b0->q8() * $qr), $this->b0->qd());
                } else {
                    $ql = $this->b0->qs();
                }
            }
            if ($qq && $ql < po::pr) {
                $ql = po::pr;
            }
        }
        return $ql;
    }
}
class qt
{
    private $qu = 3;
    private $ff;
    private $qv = false;
    private $ne = null;
    private $au = null;
    private $jn = null;
    private $aw = null;
    private $qw = null;
    private $az = null;
    public function __construct()
    {
        $this->ff = "MigratoryDataClient/v6.0 React-PHP/" . phpversion() . ", version: " . Version::VERSION;
        $this->ne = new po($this->qu, $this->ff);
        $this->az = new bu();
    }
    private function qx($md, $qy)
    {
        if (!isset($md)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: " . $qy . " - invalid first argument; expected an array of strings");
        }
        foreach ($md as $ml) {
            if (!is_string($ml)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: " . $qy . " - invalid first argument; expected an array of strings");
            }
        }
    }
    public function qz($aw)
    {
        if ($this->qv === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setLoop() method");
        }
        $this->aw = $aw;
    }
    public function q2($ir)
    {
        if (trim($ir) === '') {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setEntitlementToken() - invalid argument; expected a non-empty string");
        }
        $this->ne->q2($ir);
        $this->az->be("Configuring entitlement token: " . $ir);
        if ($this->qv === true) {
            $this->au->o6($ir);
        }
    }
    public function r0($jn)
    {
        $this->qx($jn, "setServers()");
        if ($this->qv === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setServers() method");
        }
        if (!is_array($jn) || count($jn) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setServers() - invalid argument; expected a array of strings with size > 0");
        }
        foreach ($jn as $addr) {
            if (!isset($addr) || trim($addr) === '') {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setServers() - invalid argument; expected a array of strings with size > 0");
            }
        }
        $this->az->be("Setting servers to connect to: " . v::ks($jn));
        $this->jn = $jn;
    }
    public function r1($km)
    {
        if ($this->qv === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setListener() method");
        }
        $this->qw = $km;
    }
    public function r2($bv, $bw)
    {
        if ($bw < 0 || $bw > 4) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setLogListener() - invalid second argument; expected a MigratoryDataLogLevel");
        }
        if ($this->qv === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "Error: setLogListener() - already connected; use this method before connect()");
        }
        $this->az->bx($bv, $bw);
    }
    public function nh()
    {
        if ($this->qv === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "connect() method");
        }
        if (!isset($this->aw)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setLoop().");
        }
        if (!isset($this->qw)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setListener()");
        }
        if (!isset($this->jn)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setServers().");
        }
        $this->qv = true;
        $mt = new jj($this->jn, $this->ne->b9());
        $this->au = new ms($this->ne, $mt, $this->aw, $this->qw, $this->az);
        $this->au->nh();
        $kg = $this->ne->q0();
        $r3 = array_keys($kg);
        foreach ($r3 as $dl) {
            $this->au->nv(array($dl), $kg[$dl]);
            $this->az->br(by::cc . $dl);
        }
    }
    public function nt()
    {
        $this->az->be("Disconnect from push server and release all resources.");
        if ($this->qv === true) {
            $this->qv = false;
            $this->az->br(by::c9);
            $this->au->o5();
        }
    }
    public function nv($kg, $cl)
    {
        $this->qx($kg, "subscribe()");
        if (!isset($kg) || count($kg) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid first argument; expected a array of strings with size > 0");
        }
        foreach ($kg as $j) {
            if (is_null($j) || strlen($j) == 0 || !v::ke($j)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid argument; expected a valid topic with a non-empty value");
            }    
        }
        if ($cl < 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid second argument; a int with value >= 0");
        }
        $this->az->be("Subscribing to: " . v::ks($kg));
        $this->ne->pz($kg, $cl);
        if ($this->qv) {
            $this->az->br(by::cc . v::ks($kg));
            $this->au->nv($kg, $cl);
        }
    }
    public function nz($kg)
    {
        $this->qx($kg, "subscribe()");
        if (!isset($kg) || count($kg) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: unsubscribe() - invalid argument; expected a array of strings with size > 0");
        }
        foreach ($kg as $j) {
            if (is_null($j) || strlen($j) == 0 || !v::ke($j)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid argument; expected a valid topic with a non-empty value");
            }    
        }
        $this->az->be("Unsubscribing from: " . v::ks($kg));
        $this->ne->kz($kg);
        if ($this->qv) {
            $this->az->br(by::cd . v::ks($kg));
            $this->au->nz($kg);
        }
    }
    public function o7($bq)
    {
        if ($this->qv === false) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_CONNECTED, "publish() method");
        }
        $j = $bq->getSubject();
        $k = $bq->getContent();
        if (is_null($j) || strlen($j) == 0 || !v::ke($j)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: publish() - invalid argument; expected a valid message with a non-empty topic");
        }
        if (is_null($k) || strlen($k) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: publish() - invalid argument; expected a valid message with a non-empty content");
        }
        $this->az->br(by::ce . $bq);
        $this->au->o7($bq);
    }
    public function oc()
    {
        if (!$this->qv) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "pause() method");
        }
        $this->az->be("Migratorydata client calls pause");
        $this->az->br(by::ca);
        $this->au->oc();
    }
    public function oe()
    {
        if (!$this->qv) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "resume() method");
        }
        $this->az->be("Migratorydata client calls resume");
        $this->az->br(by::cb);
        $this->au->oe();
    }
    public function q0()
    {
        return array_keys($this->ne->q0());
    }
    public function r4($d8)
    {
        if ($d8 !== MigratoryDataClient::TRANSPORT_HTTP && $d8 !== MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Argument for set_transport must be MigratoryDataClient::TRANSPORT_WEBSOCKET or MigratoryDataClient::TRANSPORT_HTTP");
        }
        if ($this->qv === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setTransport() method");
        }
        $this->ne->q3($d8);
        $this->az->be("Configuring transport type to: " . $d8);
    }
    public function q1($i)
    {
        if ($this->qv === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setEncryption() method");
        }
        $this->ne->q1($i);
        $this->az->be("Configuring encryption to: " . v::w($i));
    }
    public function q4($dp)
    {
        if ($this->qv === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setQuickReconnectMaxRetries() method");
        }
        if ($dp < 2) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setQuickReconnectMaxRetries() - invalid argument; expected an integer higher or equal to 2");
        }
        $this->au->q4($dp);
        $this->az->be("Configuring quickreconnect max retries to: " . $dp);
    }
    public function q7($r5)
    {
        if ($this->qv === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectPolicy() method");
        }
        if (!isset($r5) || ($r5 !== MigratoryDataClient::CONSTANT_WINDOWS_BACKOFF && $r5 !== MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectPolicy() - invalid argument; expected MigratoryDataClient.CONSTANT_WINDOW_BACKOFF or MigratoryDataClient.TRUNCATED_EXPONENTIAL_BACKOFF");
        }
        $this->ne->q7($r5);
        $this->az->be("Configuring reconnect policy to: " . $r5);
    }
    public function q9($r6)
    {
        if ($this->qv === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectTimeInterval() method");
        }
        if ($r6 < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectTimeInterval() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->ne->q9($r6);
        $this->az->be("Configuring setReconnectTime interval to: " . $r6);
    }
    public function r7($ia)
    {
        if ($this->qv === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "notifyAfterFailedConnectionAttempts() method");
        }
        if ($ia < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: notifyAfterFailedConnectionAttempts() - invalid argument; expected a positive integer");
        }
        $this->ne->qc($ia);
        $this->az->be("Configuring the number of failed connection attempts before sending a notification: " . $ia);
    }
    public function qe($r8)
    {
        if ($this->qv === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectMaxDelay() method");
        }
        if ($r8 < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectMaxDelay() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->ne->qe($r8);
        $this->az->be("Configuring setReconnectMax delay to: " . $r8);
    }
    public function qb($r6)
    {
        if ($this->qv === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setQuickReconnectInitialDelay() method");
        }
        if ($r6 < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setQuickReconnectInitialDelay() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->ne->qb($r6);
        $this->az->be("Configuring quickReconnectInitial delay to: " . $r6);
    }
    public function r9()
    {
        return $this->qw;
    }
    public function ra($py)
    {
        if ($this->qv === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setConnectionTimeout() method");
        }
        $this->ne->qf($py);
    }
}
class MigratoryDataClient
{
    const NOTIFY_SERVER_UP = 'NOTIFY_SERVER_UP';
    const NOTIFY_SERVER_DOWN = 'NOTIFY_SERVER_DOWN';
    const NOTIFY_DATA_SYNC = 'NOTIFY_DATA_SYNC';
    const NOTIFY_DATA_RESYNC = 'NOTIFY_DATA_RESYNC';
    const NOTIFY_SUBSCRIBE_ALLOW = 'NOTIFY_SUBSCRIBE_ALLOW';
    const NOTIFY_SUBSCRIBE_DENY = 'NOTIFY_SUBSCRIBE_DENY';
    const NOTIFY_PUBLISH_OK = 'NOTIFY_PUBLISH_OK';
    const NOTIFY_PUBLISH_FAILED = 'NOTIFY_PUBLISH_FAILED';
    const NOTIFY_MESSAGE_SIZE_LIMIT_EXCEEDED = 'NOTIFY_MESSAGE_SIZE_LIMIT_EXCEEDED';
    const NOTIFY_PUBLISH_DENIED = 'NOTIFY_PUBLISH_DENIED';
    const CONSTANT_WINDOWS_BACKOFF = 'CONSTANT_WINDOW_BACKOFF';
    const TRUNCATED_EXPONENTIAL_BACKOFF = 'TRUNCATED_EXPONENTIAL_BACKOFF';
    const TRANSPORT_HTTP = 'TRANSPORT_HTTP';
    const TRANSPORT_WEBSOCKET = 'TRANSPORT_WEBSOCKET';
    const NOTIFY_CONNECT_OK = 'NOTIFY_CONNECT_OK';
    const NOTIFY_CONNECT_DENY = 'NOTIFY_CONNECT_DENY';
    private $rb = null;
    public function __construct()
    {
        $this->rb = new qt();
    }
    public function setLoop(\React\EventLoop\LoopInterface $aw)
    {
        $this->rb->qz($aw);
    }
    public function setListener(MigratoryDataListener $km)
    {
        $this->rb->r1($km);
    }
    public function setLogListener(MigratoryDataLogListener $bv, int $bw)
    {
        $this->rb->r2($bv, $bw);
    }
    public function setEntitlementToken(string $ir)
    {
        $this->rb->q2($ir);
    }
    public function setServers(array $jn)
    {
        $this->rb->r0($jn);
    }
    public function connect()
    {
        $this->rb->nh();
    }
    public function disconnect()
    {
        $this->rb->nt();
    }
    public function subscribe(array $kg)
    {
        $this->rb->nv($kg, 0);
    }
    public function subscribeWithHistory(array $kg, int $rc)
    {
        $this->rb->nv($kg, $rc);
    }
    public function unsubscribe(array $kg)
    {
        $this->rb->nz($kg);
    }
    public function publish(MigratoryDataMessage $bq)
    {
        $this->rb->o7($bq);
    }
    public function pause()
    {
        $this->rb->oc();
    }
    public function resume()
    {
        $this->rb->oe();
    }
    public function setTransport(string $d8)
    {
        $this->rb->r4($d8);
    }
    public function setEncryption(bool $i)
    {
        $this->rb->q1($i);
    }
    public function getSubjects()
    {
        return $this->rb->q0();
    }
    public function getListener()
    {
        return $this->rb->r9();
    }
    public function setQuickReconnectMaxRetries(int $qm)
    {
        $this->rb->q4($qm);
    }
    public function setReconnectPolicy(string $r5)
    {
        $this->rb->q7($r5);
    }
    public function setReconnectTimeInterval(int $rd)
    {
        $this->rb->q9($rd);
    }
    public function notifyAfterFailedConnectionAttempts(int $qm)
    {
        $this->rb->r7($qm);
    }
    public function setReconnectMaxDelay(int $rd)
    {
        $this->rb->qe($rd);
    }
    public function setQuickReconnectInitialDelay(int $rd)
    {
        $this->rb->qb($rd);
    }
    public function setConnectionTimeout(int $py)
    {
        $this->rb->ra($py);
    }
}
