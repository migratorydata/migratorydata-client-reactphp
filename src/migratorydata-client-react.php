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
        self::$dy[et::fo] = 0x30;
        self::$dy[et::fp] = 0x1D;
        self::$dy[et::fq] = 0x26;
        self::$e1 = array_fill(0, 128, -1);
        self::fr(et::eu, fs::ft);
        self::fr(et::ev, fs::fu);
        self::fr(et::ew, fs::fv);
        self::fr(et::ex, fs::fv);
        self::fr(et::ey, fs::fv);
        self::fr(et::ez, fs::fv);
        self::fr(et::f0, fs::fu);
        self::fr(et::f1, fs::fu);
        self::fr(et::f2, fs::fu);
        self::fr(et::f3, fs::fv);
        self::fr(et::f4, fs::fu);
        self::fr(et::f5, fs::fv);
        self::fr(et::f6, fs::ft);
        self::fr(et::f7, fs::ft);
        self::fr(et::f8, fs::ft);
        self::fr(et::f9, fs::fv);
        self::fr(et::fa, fs::fv);
        self::fr(et::fb, fs::fv);
        self::fr(et::fc, fs::fv);
        self::fr(et::fd, fs::ft);
        self::fr(et::fe, fs::ft);
        self::fr(et::ff, fs::ft);
        self::fr(et::fg, fs::fv);
        self::fr(et::fh, fs::fv);
        self::fr(et::fi, fs::ft);
        self::fr(et::fj, fs::fv);
        self::fr(et::fk, fs::fv);
        self::fr(et::fl, fs::ft);
        self::fr(et::fm, fs::fv);
        self::fr(et::fo, fs::ft);
        self::fr(et::fp, fs::fv);
        self::fr(et::fq, fs::fv);
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
            $e = self::fw($i);
            if ($e != -1) {
                self::$dz[$e] = $i;
            }
        }
        self::$df = array_fill(0, 128, -1);
        for ($fx = 0; $fx <= et::fq; $fx++) {
            self::$df[self::fy($fx)] = $fx;
        }
        self::$e2 = array_fill(0, 128, -1);
        for ($fx = 0; $fx <= e8::es; $fx++) {
            self::$e2[self::fz($fx)] = $fx;
        }
    }
    public static function g0($y)
    {
        $g1 = array_merge(unpack('C*', $y));
        $g2 = 0;
        for ($fx = 0; $fx < count($g1); $fx++) {
            $g3 = self::fw($g1[$fx]);
            if ($g3 != -1) {
                $g2++;
            }
        }
        if ($g2 == 0) {
            return call_user_func_array("pack", array_merge(array("C*"), $g1));
        }
        $g4 = array_fill(0, count($g1) + $g2, 0);
        for ($fx = 0, $g5 = 0; $fx < count($g1); $fx++, $g5++) {
            $g3 = self::fw($g1[$fx]);
            if ($g3 != -1) {
                $g4[$g5] = self::e6;
                $g4[$g5 + 1] = $g3;
                $g5++;
            } else {
                $g4[$g5] = $g1[$fx];
            }
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g4));
    }
    public static function g6($y)
    {
        $g1 = array_merge(unpack('C*', $y));
        $g2 = 0;
        if (count($g1) == 0) {
            return $y;
        }
        for ($fx = 0; $fx < count($g1); $fx++) {
            if ($g1[$fx] == self::e6) {
                $g2++;
            }
        }
        $g4 = array_fill(0, count($g1) - $g2, 0);
        for ($fx = 0, $g5 = 0; $fx < count($g1); $fx++, $g5++) {
            $g7 = $g1[$fx];
            if ($g7 == self::e6) {
                if ($fx + 1 < count($g1)) {
                    $g4[$g5] = self::g8($g1[$fx + 1]);
                    if ($g4[$g5] == -1) {
                        throw new \InvalidArgumentException();
                    }
                    $fx++;
                } else {
                    throw new \InvalidArgumentException();
                }
            } else {
                $g4[$g5] = $g7;
            }
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g4));
    }
    public static function g9($y, $ga, $gb)
    {
        $gc = null;
        $gd = strpos($y, chr(self::fy($ga)));
        $ge = strpos($y, chr(self::e5), $gd);
        if ($gd !== false && $ge !== false) {
            $gf = substr($y, $gd + 1, $ge - ($gd + 1));
            switch ($gb) {
                case fs::gg:
                    $gc = $gf;
                    break;
                case fs::fu:
                    $gc = $gf;
                    break;
                case fs::ft:
                    $gc = $gf;
                    break;
                case fs::fv:
                    $gc = self::gh($gf);
                    break;
            }
        }
        return $gc;
    }
    public static function gh($gi)
    {
        $y = array_merge(unpack("C*", $gi));
        $g4 = 0;
        $gj = -1;
        $gk = 0;
        $gl;
        $g7;
        $gm = count($y);
        $ab = 0;
        if ($gm == 1) {
            return $y[0];
        } else if ($gm == 2 && $y[$ab] == self::e6) {
            $g7 = self::g8($y[$ab + 1]);
            if ($g7 != -1) {
                return $g7;
            } else {
                throw new \InvalidArgumentException();
            }
        }
        for (; $gm > 0; $gm--) {
            $g7 = $y[$ab];
            $ab++;
            if ($g7 == self::e6) {
                if ($gm - 1 < 0) {
                    throw new \InvalidArgumentException();
                }
                $gm--;
                $g7 = $y[$ab];
                $ab++;
                $gl = self::g8($g7);
                if ($gl == -1) {
                    throw new \InvalidArgumentException();
                }
            } else {
                $gl = $g7;
            }
            if ($gj > 0) {
                $gk |= $gl >> $gj;
                $g4 = $g4 << 8 | ($gk >= 0 ? $gk : $gk + 256);
                $gk = ($gl << (8 - $gj));
            } else {
                $gk = ($gl << -$gj);
            }
            $gj = ($gj + 7) % 8;
        }
        return $g4;
    }
    public static function gn($gk)
    {
        if (($gk & 0xFFFFFF80) == 0) {
            $i = self::fw($gk);
            if ($i == -1) {
                return pack('C*', $gk);
            } else {
                return pack('C*', self::e6, $i);
            }
        }
        $go = 0;
        if (($gk & 0xFF000000) != 0) {
            $go = 24;
        } else if (($gk & 0x00FF0000) != 0) {
            $go = 16;
        } else {
            $go = 8;
        }
        $g4 = array_fill(0, 10, 0);
        $gp = 0;
        $gq = 0;
        while ($go >= 0) {
            $b = (($gk >> $go) & 0xFF);
            $gq++;
            $g4[$gp] |= ($b >= 0 ? $b : $b + 256) >> $gq;
            $g3 = self::fw($g4[$gp]);
            if ($g3 != -1) {
                $g4[$gp] = self::e6;
                $g4[$gp + 1] = $g3;
                $gp++;
            }
            $gp++;
            $g4[$gp] |= ($b << (7 - $gq)) & 0x7F;
            $go -= 8;
        }
        $g3 = self::fw($g4[$gp]);
        if ($g3 != -1) {
            $g4[$gp] = self::e6;
            $g4[$gp + 1] = $g3;
            $gp++;
        }
        $gp++;
        if ($gp < count($g4)) {
            $g4 = array_slice($g4, 0, $gp);
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g4));
    }
    public static function g8($b)
    {
        return $b >= 0 ? self::$dz[$b] : -1;
    }
    public static function fw($b)
    {
        return $b >= 0 ? self::$e0[$b] : -1;
    }
    public static function fy($h)
    {
        return self::$dy[$h];
    }
    public static function gr($g7)
    {
        return self::$df[$g7];
    }
    public static function fz($o)
    {
        return self::$dx[$o];
    }
    public static function dg($g7)
    {
        return self::$e2[$g7];
    }
    public static function gs()
    {
        return self::e3;
    }
    public static function fr($gt, $gu)
    {
        self::$e1[dw::fy($gt)] = $gu;
    }
    public static function gv($gt)
    {
        $gw = self::fy($gt);
        return self::$e1[$gw];
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
    const fo = 29;
    const fp = 30;
    const fq = 31;
}
class fs
{
    const gg = 0;
    const fu = 1;
    const ft = 2;
    const fv = 3;
}
class gx
{
    const gy = "1";
    const gz = "2";
    const h0 = "3";
    const h1 = "4";
}
class h2
{
    const h3 = 4;
    const h4 = 8;
}
class h5
{
    const h6 = "d";
    const h7 = "a";
}
class h8
{
	const h9 = 0;
	const ha = 1;
	const hb = 2;
	const hc = 3;
}
dw::e7();
class hd implements c
{
	private $he = "POST / HTTP/1.1";
	private $hf = "Host: ";
	private $hg = "Content-Length: ";
	private $hh = "00000";
	private $hi = "\r\n";
	public function __construct()
	{
	}
	public function d($e)
	{
		$g = new x();
		$g->a6($this->he);
		$g->a6($this->hi);
		$g->a6($this->hf);
		$g->a6(dw::g0($e));
		$g->a6($this->hi);
		$g->a6($this->hg);
		$g->ae();
		$g->a6($this->hh);
		$g->a6($this->hi);
		$g->a6($this->hi);
		$g->af();
		return $g;
	}
	public function f($g)
	{
		$ab = $g->ap();
		$hj = strval($ab - $g->aj());
		if (strlen($hj) <= strlen($this->hh)) {
			$b0 = 0;
			for ($fx = strlen($this->hh) - strlen($hj); $fx < strlen($this->hh); $fx++) {
				$g->aa($g->ai() + $fx, $hj[$b0]);
				$b0++;
			}
		} else {
			$hk = substr($g->an(), 0, $g->ai());
			$hk .= $hj;
			$hk .= substr($g->an(), $g->ai() + strlen($this->hh));
			$g->am($hk);
		}
	}
	public function h($e, $i)
	{
		return "";
	}
}
class hl implements c
{
	private $hm = "GET /WebSocketConnection HTTP/1.1";
	private $hn = "GET /WebSocketConnection-Secure HTTP/1.1";
	private $hf = "Host: ";
	private $ho = "Origin: ";
	private $hp = "Upgrade: websocket";
	private $hq = "Sec-WebSocket-Key: 23eds34dfvce4";
	private $hr = "Sec-WebSocket-Version: 13";
	private $hs = "Sec-WebSocket-Protocol: pushv1";
	private $ht = "Connection: Upgrade";
	private $hi = "\r\n";
	private $hu = 10;
	private $hv = -128;
	private $hw = -128;
	private $hx = 0x02;
	public function __construct()
	{
	}
	public function d($e)
	{
		$g = new x();
		for ($fx = 0; $fx < $this->hu; $fx++) {
			$g->a6(chr(0x00));
		}
		for ($fx = 0; $fx < 4; $fx++) {
			$hy = chr(rand(0, 100));
			$g->a6($hy);
			$g->a7($hy);
		}
		$g->ag();
		return $g;
	}
	public function f($g)
	{
		$hz = chr($this->hv) | chr($this->hx);
		$g->ah();
		$i0 = $g->al() - $g->ak();
		$i1 = $this->i2($i0);
		$i3 = $this->i4($i0, $i1);
		$i5 = 0;
		if ($i1 === 1) {
			$i5 = 8;
			$g->aa($i5, $hz);
			$g->aa($i5 + 1, $i3[0] | chr($this->hw));
		} else if ($i1 === 2) {
			$i5 = 6;
			$g->aa($i5, $hz);
			$g->aa($i5 + 1, chr(126) | chr($this->hw));
			for ($fx = 0; $fx <= 1; $fx++) {
				$g->aa($i5 + 2 + $fx, $i3[$fx]);
			}
		} else {
			$g->aa($i5, $hz);
			$g->aa($i5 + 1, chr(127) | chr($this->hw));
			for ($fx = 0; $fx <= 7; $fx++) {
				$g->aa($i5 + 2 + $fx, $i3[$fx]);
			}
		}
		$g->a3($i5);
	}
	public function h($e, $i)
	{
		$g = new x();
		if (!$i) {
			$g->a6($this->hm);
		} else {
			$g->a6($this->hn);
		}
		$g->a6($this->hi);
		$g->a6($this->ho);
		$g->a6("http://" . $e);
		$g->a6($this->hi);
		$g->a6($this->hf);
		$g->a6($e);
		$g->a6($this->hi);
		$g->a6($this->hp);
		$g->a6($this->hi);
		$g->a6($this->ht);
		$g->a6($this->hi);
		$g->a6($this->hq);
		$g->a6($this->hi);
		$g->a6($this->hr);
		$g->a6($this->hi);
		$g->a6($this->hs);
		$g->a6($this->hi);
		$g->a6($this->hi);
		return $g;
	}
	private function i2($i6)
	{
		if ($i6 <= 125) {
			return 1;
		} else if ($i6 <= 65535) {
			return 2;
		}
		return 8;
	}
	private function i4($ac, $i1)
	{
		$g = "";
		$i7 = 8 * $i1 - 8;
		for ($fx = 0; $fx < $i1; $fx++) {
			$i8 = $this->i9($ac, $i7 - 8 * $fx);
			$ia = $i8 - (256 * intval($i8 / 256));
			$g .= chr($ia);
		}
		return $g;
	}
	private function i9($gk, $ib)
	{
		return ($gk % 0x100000000) >> $ib;
	}
}
class ic
{
    private $ey = h2::h4;
    private $id = MigratoryDataClient::TRANSPORT_WEBSOCKET;
    public function __construct()
    {
    }
    public function ie()
    {
        $this->id = MigratoryDataClient::TRANSPORT_HTTP;
        $this->ey = h2::h3;
    }
    public function ig($g, $ih, $ii, $ij, $ik)
    {
        if ($this->id == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fz(e8::eq)));
        } else {
            $g->a6(chr(dw::fz(e8::eq)) ^ $g->a8());
        }
        if (strlen($ih) > 0) {
            $g->a6($this->il(dw::fy(et::f7), dw::g0($ih), $g));
        }
        $g->a6($this->il(dw::fy(et::fg), dw::gn($ii), $g));
        $g->a6($this->il(dw::fy(et::ff), dw::g0($ik), $g));
        $g->a6($this->il(dw::fy(et::fm), dw::gn($ij), $g));
        $g->a6($this->il(dw::fy(et::ey), dw::gn($this->ey), $g));
        if ($this->id == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    public function im($g, $j, $in)
    {
        if ($this->id == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fz(e8::e9)));
        } else {
            $g->a6(chr(dw::fz(e8::e9)) ^ $g->a8());
        }
        $g->a6($this->il(dw::fy(et::eu), dw::g0($j->cz()), $g));
        if (isset($in) && $in >= 0) {
            $g->a6($this->il(dw::fy(et::ez), dw::gn($in), $g));
        }
        $io = $j->d7();
        switch ($io) {
            case ct::cu:
                break;
            case ct::d9:
                $g->a6($this->il(dw::fy(et::fk), dw::gn($j->d0()), $g));
                break;
            case ct::da:
                $g->a6($this->il(dw::fy(et::ex), dw::gn($j->cx()), $g));
                $g->a6($this->il(dw::fy(et::ew), dw::gn($j->cv() + 1), $g));
                break;
        }
        $g->a6($this->il(dw::fy(et::ey), dw::gn($this->ey), $g));
        if ($this->id == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    public function ip($g, $in, $j)
    {
        if ($this->id == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fz(e8::ea)));
        } else {
            $g->a6(chr(dw::fz(e8::ea)) ^ $g->a8());
        }
        $g->a6($this->il(dw::fy(et::eu), dw::g0($j), $g));
        if ($in > 0) {
            $g->a6($this->il(dw::fy(et::ez), dw::gn($in), $g));
        }
        $g->a6($this->il(dw::fy(et::ey), dw::gn($this->ey), $g));
        if ($this->id == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    public function iq($g, $in)
    {
        if ($this->id == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fz(e8::ea)));
        } else {
            $g->a6(chr(dw::fz(e8::ea)) ^ $g->a8());
        }
        if ($in > 0) {
            $g->a6($this->il(dw::fy(et::ez), dw::gn($in), $g));
        }
        $g->a6($this->il(dw::fy(et::ey), dw::gn($this->ey), $g));
        if ($this->id == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    public function ir($g, $in, $is)
    {
        if ($this->id == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fz(e8::es)));
        } else {
            $g->a6(chr(dw::fz(e8::es)) ^ $g->a8());
        }
        if ($in > 0) {
            $g->a6($this->il(dw::fy(et::ez), dw::gn($in), $g));
        }
        if (strlen($is) > 0) {
            $g->a6($this->il(dw::fy(et::f7), dw::g0($is), $g));
        }
        $g->a6($this->il(dw::fy(et::ey), dw::gn($this->ey), $g));
        if ($this->id == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    public function it($g, $bq, $iu)
    {
        if ($this->id == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fz(e8::em)));
        } else {
            $g->a6(chr(dw::fz(e8::em)) ^ $g->a8());
        }
        $g->a6($this->il(dw::fy(et::eu), dw::g0($bq->getSubject()), $g));
        if ($bq->isCompressed()) {
            $iv = $this->iw($bq->getContent());
            if (strlen($iv) < strlen($bq->getContent())) {
                $g->a6($this->il(dw::fy(et::ev), dw::g0($iv), $g));
            } else {
                $g->a6($this->il(dw::fy(et::ev), dw::g0($bq->getContent()), $g));
                $bq->setCompressed(false);
            }
        } else {
            $g->a6($this->il(dw::fy(et::ev), dw::g0($bq->getContent()), $g));
        }
        $m = $bq->getReplySubject();
        if (strlen($m) > 0) {
            $g->a6($this->il(dw::fy(et::fl), dw::g0($m), $g));
        }
        $l = $bq->getClosure();
        if (strlen($l) > 0) {
            $g->a6($this->il(dw::fy(et::fi), dw::g0($l), $g));
        }
        $g->a6($this->il(dw::fy(et::ez), dw::gn($iu), $g));
        if ($bq->getQos() == QoS::GUARANTEED) {
            $g->a6($this->il(dw::fy(et::fc), dw::gn(QoS::GUARANTEED), $g));
        } else {
            $g->a6($this->il(dw::fy(et::fc), dw::gn(QoS::STANDARD), $g));
        }
        if ($bq->isRetained() == true) {
            $g->a6($this->il(dw::fy(et::fb), dw::gn(1), $g));
        } else {
            $g->a6($this->il(dw::fy(et::fb), dw::gn(0), $g));
        }
        if ($bq->isCompressed()) {
            $g->a6($this->il(dw::fy(et::fq), dw::gn(1), $g));
        }
        $g->a6($this->il(dw::fy(et::ey), dw::gn($this->ey), $g));
        if ($this->id == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    private function il($gc, $y, $g)
    {
        $g4 = '';
        if ($this->id == MigratoryDataClient::TRANSPORT_HTTP) {
            $g4 .= chr($gc);
            $g4 .= $y;
            $g4 .= chr(dw::e5);
        } else {
            $g4 .= chr($gc) ^ $g->a8();
            for ($fx = 0; $fx < strlen($y); $fx++) {
                $g4 .= $y[$fx] ^ $g->a8();
            }
            $g4 .= chr(dw::e5) ^ $g->a8();
        }
        return $g4;
    }
    public function iw($k)
    {
        $ix = gzdeflate($k);
        if ($ix === false) {
            return $k;
        }
        $iy = base64_encode($ix);
        return $iy;
    }
    public function iz($y)
    {
        $j0 = base64_decode($y);
        if ($j0 === false) {
            return $y;
        }
        $j1 = gzinflate($j0);
        if ($j1 === false) {
            return $y;
        }
        return $j1;
    }
}
class j2
{
    const j3 = 80;
    const j4 = 443;
    const j5 = 100;
    private $e;
    private $av;
    private $j6;
    private $j7 = self::j5;
    public function __construct($j8, $j9)
    {
        $this->j6 = $j8;
        $ja = explode(" ", $j8, 2);
        if (count($ja) == 2) {
            $j7 = intval($ja[0]);
            if ($j7 <= 0 || $j7 > 100) {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "the weight of a cluster member must be between 0 and 100, weight: " . $j7);
            }
            $this->j7 = intval($ja[0]);
            $j8 = $ja[1];
        }
        $jb = strrpos($j8, '/');
        $jc = $jb === false ? $j8 : substr($j8, $jb + 1);
        $jd = strrpos($jc, ':');
        if ($jd !== false) {
            $this->e = substr($jc, 0, $jd);
            $this->av = intval(substr($jc, $jd + 1));
            if ($this->av < 0 || $this->av > 65535) {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $j8 . " - invalid port number");
            }
            if ($this->e === "") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "Cluster member with null address");
            }
            if ($this->e === "*") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $j8 . " - wildcard address (*) cannot be used to define a cluster member");
            }
        } else {
            $this->e = $jc;
            if ($this->e === "") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "Cluster member with null address");
            }
            if ($this->e === "*") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $j8 . " - wildcard address (*) cannot be used to define a cluster member");
            }
            if ($j9 === false) {
                $this->av = self::j3;
            } else {
                $this->av = self::j4;
            }
        }
    }
    public function je()
    {
        return $this->e;
    }
    public function jf()
    {
        return $this->av;
    }
    public function jg()
    {
        return $this->j6;
    }
    public function jh()
    {
        return $this->j7;
    }
    public function ji($jj)
    {
        if ($this->je() === $jj->je()) {
            if ($this->jf() === $jj->jf()) {
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
class jk
{
    private $jl = array();
    private $jm = array();
    private $jn = null;
    public function __construct($jo, $j9)
    {
        foreach ($jo as $jp) {
            $this->jl[] = new j2($jp, $j9);
        }
    }
    public function jq()
    {
        $jr = $this->js();
        if (count($jr) === 0) {
            $this->jm = array();
            $jr = $this->jl;
        }
        $jt = $this->ju($jr);
        $this->jn = $jr[$jt];
        return $this->jn;
    }
    public function jv($jj)
    {
        array_push($this->jm, $jj);
    }
    public function bg()
    {
        return $this->jn;
    }
    private function js()
    {
        $jr = array();
        foreach ($this->jl as $jj) {
            $jw = true;
            foreach ($this->jm as $jx) {
                if ($jj->ji($jx)) {
                    $jw = false;
                }
            }
            if ($jw) {
                array_push($jr, $jj);
            }
        }
        return $jr;
    }
    private function ju($jr)
    {
        $jt = -1;
        $jy = 0;
        foreach ($jr as $jj) {
            $jy = $jy + $jj->jh();
        }
        if ($jy === 0) {
            $jt = floor(count($jr) * (mt_rand() / mt_getrandmax()));
        } else {
            $j7 = floor($jy * (mt_rand() / mt_getrandmax()));
            $jy = 0;
            $fx = 0;
            foreach ($jr as $jj) {
                $jy = $jy + $jj->jh();
                if ($jy > $j7) {
                    $jt = $fx;
                    break;
                }
                $fx++;
            }
        }
        return $jt;
    }
}
class jz extends MigratoryDataMessage
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
    public function k0($q)
    {
        $this->q = $q;
    }
    public function k1()
    {
        return $this->q;
    }
}
class v
{
    const k2 = "NOT_SUBSCRIBED";
    const k3 = "OK";
    const k4 = "FAILED";
    const k5 = "DENY";
    const bd = "connection_passive_close";
    const k6 = "connection_active_close_keep_alive";
    const k7 = "connection_active_close_seq_higher";
    const bi = "connection_error";
    const cr = "cache_ok";
    const k8 = "cache_ok_no_new_message";
    const k9 = "cache_ok_new_epoch";
    const ka = "no_cache";
    const kb = "no_seq";
    const kc = "end";
    const kd = '/^\/([^\/]+\/)*([^\/]+|\*)$/';
    const ke = "\r\n\r\n";
    const hg = "Content-Length: ";
    public static function kf($gf)
    {
        return preg_match(self::kd, $gf);
    }
    public static function kg($kh)
    {
        $ki = array();
        foreach ($kh as $j) {
            if (isset($j) && v::kf($j)) {
                array_push($ki, $j);
            }
        }
        return $ki;
    }
    public static function kj($kk, $kl, $km, $kn, $az)
    {
        // different epoch, reset and continue.
        if ($kk->cx() !== $km) {
            $kk->cw($kl);
            $kk->cy($km);
            return ko::kp;
        }
        // if received seq is equal or smaller than the local seq then the message is ignored
        if ($kl <= $kk->cv()) {
            return ko::kq;
        }
        // if received seq is +1 than the local seq then the message is processed
        if ($kl === ($kk->cv() + 1)) {
            if ($kk->cs() == ct::da) {
                $kk->db();
                $kn->onStatus(MigratoryDataClient::NOTIFY_DATA_SYNC, $kk->cz());
                $az->br(by::c4 . MigratoryDataClient::NOTIFY_DATA_SYNC . $kk);
            }
            $kk->cw($kk->cv() + 1);
            return ko::kp;
        }
        // there is a hole in the order of the messages
        // if there is a missing message when the session is active, then we disconnect the client and make failover.
        if ($kk->cp() > 0) {
            $az->br("Missing messages: expected message with sequence number: " . ($kk->cv() + 1) . ", received instead message with sequence number:  " . $kl . " !");
            return ko::kr;
        }
        $az->br("Reset sequence: '" . ($kk->cv() + 1) . "'. The new sequence is: '" . $kl . "' !");
        $kk->cw($kl);
        $kn->onStatus(MigratoryDataClient::NOTIFY_DATA_RESYNC, $kk->cz());
        $az->br(by::c4 . MigratoryDataClient::NOTIFY_DATA_RESYNC . " " . $kk);
        return ko::kp;
    }
    public static function ks($kk, $kl, $km, $kn, $az)
    {
        // different epoch, reset and continue.
        if ($kk->cx() !== $km) {
            $kk->cw($kl);
            $kk->cy($km);
            return ko::kp;
        }
        // if received seq is equal or smaller than the local seq then the message is ignored
        if ($kl <= $kk->cv()) {
            return ko::kq;
        }
        if ($kk->cs() == ct::da) {
            $kk->db();
        }
        $kk->cw($kl);
        return ko::kp;
    }
    public static function kt($ku)
    {
        $kv = "";
        if (count($ku) > 0) {
            $kv .= "[";
            for ($fx = 0; $fx < count($ku); $fx++) {
                $kv .= $ku[$fx];
                if ($fx + 1 != count($ku)) {
                    $kv .= ", ";
                }
            }
            $kv .= "]";
        }
        return $kv;
    }
    public static function w($kw)
    {
        if ($kw) {
            return "true";
        }
        return "false";
    }
}
class kx
{
    private $ky = array();
    public function kz($kh, $cl)
    {
        foreach ($kh as $j) {
            if (!array_key_exists($j, $this->ky)) {
                $kk = new cj($j, $cl);
                $this->ky[$j] = $kk;
            }
        }
    }
    public function l0($kh)
    {
        $l1 = array();
        foreach ($kh as $j) {
            if (array_key_exists($j, $this->ky)) {
                unset($this->ky[$j]);
                array_push($l1, $j);
            }
        }
        return $l1;
    }
    public function l2()
    {
        return array_keys($this->ky);
    }
    public function cz($j)
    {
        if (array_key_exists($j, $this->ky)) {
            return $this->ky[$j];
        }
        return null;
    }
    public function l3($j)
    {
        return array_key_exists($j, $this->ky);
    }
    public function l4()
    {
        $l5 = array_values($this->ky);
        foreach ($l5 as $l6) {
            $l6->dc();
        }
    }
}
class l7
{
    private $l8;
    private $l9;
    public function __construct($l8, $l9)
    {
        $this->l8 = $l8;
        $this->l9 = $l9;
    }
    public function la()
    {
        return $this->l8;
    }
    public function lb()
    {
        return $this->l9;
    }
}
class lc
{
    public static function ld($g)
    {
        $le = lc::lf($g, 0);
        $ab = $le->la();
        if ($g->ap() < $le->lb()) {
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
    public static function lf($g, $a3)
    {
        $lg = new l7(-1, -1);
        if ($a3 == $g->ap()) {
            return $lg;
        }
        $ab = $a3;
        $lh = 2;
        $li = 0;
        $lj = 0;
        $lk = $g->ap() - $ab;
        if ($lk < $lh) {
            return $lg;
        }
        $g7 = dw::gh($g->ad($ab));
        $hz = ($g7 >> 7) & 0x01;
        $ll = $g7 & 0x40;
        $lm = $g7 & 0x20;
        $ln = $g7 & 0x10;
        if ($hz !== 1 || $ll != 0 || $lm != 0 || $ln != 0) {
            return $lg;
        }
        $ab++;
        $g7 = dw::gh($g->ad($ab));
        $lo = $g7 & 0x7F;
        if ($lo < 126) {
            $lj = 0;
            $li = $lo;
        } else if ($lo === 126) {
            $lj = 2;
            if ($lk < $lh + $lj) {
                return $lg;
            }
            $lp = "";
            for ($fx = $ab + 1; $fx <= $ab + $lj; $fx++) {
                $lp .= $g->ad($fx);
            }
            $li = lc::lq($lp);
            $ab += $lj;
        } else {
            $lj = 8;
            if ($lk < $lh + $lj) {
                return $lg;
            }
            $lp = "";
            for ($fx = $ab + 1; $fx <= $ab + $lj; $fx++) {
                $lp .= $g->ad($fx);
            }
            $li = lc::lq($lp);
            $ab += $lj;
        }
        if ($lk < ($lh + $lj + $li)) {
            return $lg;
        }
        $ab += 1;
        return new l7($ab, $ab + $li);
    }
    private static function lq($y)
    {
        if (strlen($y) === 2) {
            return (ord($y[0] & chr(0xFF)) << 8) | ord($y[1] & chr(0xFF));
        } else {
            $lr = ord($y[4] & chr(0x7F)) << 24;
            $ls = ord($y[5] & chr(0xFF)) << 16;
            $lt = ord($y[6] & chr(0xFF)) << 8;
            $lu = ord($y[7] & chr(0xFF));
            $lv = $lr | $ls | $lt | $lu;
            return $lv;
        }
    }
}
class lw
{
    public static function lx($g)
    {
        $ly = $g->a9();
        if ($g->ad($ly) == "H") {
            $ly = self::lz($g);
        }
        if ($ly == -1) {
            return array();
        }
        $g->a3($ly);
        $m0 = array();
        while (true) {
            if ($ly >= $g->ap()) {
                return $m0;
            }
            if (dw::gh($g->ad($ly)) == dw::gs()) {
                $ly++;
            } else {
                $le = lc::lf($g, $ly);
                $m1 = $le->la();
                $m2 = $le->lb();
                if ($m1 == -1) {
                    return $m0;
                }
                while (true) {
                    $fx = self::m3($g, $m1, $m2, chr(dw::e4));
                    if ($fx == -1) {
                        break;
                    }
                    $df = self::m4($g, $m1 + 1, $fx);
                    if ($df != null) {
                        $m5 = new dd(dw::dg(ord($g->ad($m1))), $df);
                        array_push($m0, $m5);
                    }
                    $m1 = $fx + 1;
                    $g->a3($m1);
                }
                $ly = $g->a9();
            }
        }
    }
    public static function m6($g)
    {
        $ly = lw::m7($g);
        if ($ly == -1) {
            return array();
        }
        $g->a3($ly);
        $m0 = array();
        $ab = $g->a9();
        while (true) {
            $fx = self::m3($g, $ab, $g->ap(), chr(dw::e4));
            if ($fx == -1) {
                break;
            }
            $m8 = $g->ad($ab);
            if ($m8 == "H") {
                $m9 = lw::m6($g);
                foreach ($m9 as $ma) {
                    array_push($m0, $ma);
                }
                break;
            }
            $df = lw::m4($g, $ab + 1, $fx);
            $m5 = new dd(dw::dg(ord($g->ad($ab))), $df);
            array_push($m0, $m5);
            $ab = $fx + 1;
            $g->a3($ab);
        }
        return $m0;
    }
    public static function m4($g, $l8, $l9)
    {
        $df = null;
        while (true) {
            if ($l8 >= $l9) {
                break;
            }
            $gt = ord($g->ad($l8));
            $mb = self::m3($g, $l8 + 1, $l9, chr(dw::e5));
            if ($mb == -1) {
                return null;
            }
            $gc = dw::gr($gt);
            if ($gc === null) {
                $l8 = $mb + 1;
                continue;
            }
            $l8++;
            if ($df == null) {
                $df = array();
            }
            $ac = null;
            $mc = substr($g->an(), $l8, $mb - $l8);
            switch (dw::gv($gc)) {
                case fs::fv:
                    $ac = dw::gh($mc);
                    break;
                case fs::ft:
                    $ac = dw::g6($mc);
                    break;
                case fs::fu:
                    $ac = dw::g6($mc);
                    break;
                case fs::gg:
                    $ac = $mc;
                    break;
            }
            if (!array_key_exists($gc, $df)) {
                $df[$gc] = $ac;
            } else {
                $md = $df[$gc];
                if (is_array($md)) {
                    array_push($md, $ac);
                } else {
                    $me = array();
                    array_push($me, $md);
                    array_push($me, $ac);
                    $df[$gc] = $me;
                }
            }
            $l8 = $mb + 1;
        }
        return $df;
    }
    public static function m7($g)
    {
        $mf = $g->a9();
        $y = $g->ao();
        $mg = dw::g0(v::hg);
        $ab = lw::mh($mg, $y);
        if ($ab == -1) {
            return -1;
        }
        $ab += strlen($mg);
        $mi = "\r";
        $mj = lw::m3($g, $ab, $g->ap(), $mi);
        if ($mj == -1) {
            return -1;
        }
        $mk = substr($y, $ab, $mj - $ab);
        $ml = intval($mk);
        $ab = lw::mh(v::ke, $y);
        if ($ab == -1) {
            return $ab;
        }
        $ab += strlen(v::ke);
        if (($ab + $ml) > strlen($y)) {
            return -1;
        }
        return $mf + $ab;
    }
    private static function m3($g, $l8, $l9, $mm)
    {
        for ($fx = $l8; $fx < $l9; $fx++) {
            $x = $g->ad($fx);
            if ($g->ad($fx) == $mm) {
                return $fx;
            }
        }
        return -1;
    }
    private static function mh($mn, $mo)
    {
        $ma = strlen($mn);
        $ib = strlen($mo);
        $mp = array_fill(0, $ma, 0);
        lw::mq($mn, $ma, $mp);
        $fx = 0;
        $g5 = 0;
        while ($fx < $ib) {
            if ($mn[$g5] == $mo[$fx]) {
                $g5++;
                $fx++;
            }
            if ($g5 == $ma) {
                return $fx - $g5;
            } else if ($fx < $ib && $mn[$g5] != $mo[$fx]) {
                if ($g5 != 0)
                    $g5 = $mp[$g5 - 1];
                else
                    $fx = $fx + 1;
            }
        }
        return -1;
    }
    private static function mq($mn, $ma, &$mp)
    {
        $gm = 0;
        $mp[0] = 0;
        $fx = 1;
        while ($fx < $ma) {
            if ($mn[$fx] == $mn[$gm]) {
                $gm++;
                $mp[$fx] = $gm;
                $fx++;
            } else {
                if ($gm != 0) {
                    $gm = $mp[$gm - 1];
                } else {
                    $mp[$fx] = 0;
                    $fx++;
                }
            }
        }
    }
    private static function lz($g)
    {
        $mr = "\r\n\r\n";
        $ab = $g->a9();
        $fx = self::mh($mr, $g->ao());
        if ($fx == -1) {
            return -1;
        }
        $ab = $fx + strlen($mr);
        return $ab;
    }
}
class Version
{
        //      6       ms   xx   ms xxx
    // push version ms API ID ms API version
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
class mt
{
    private $b0 = null;
    private $e = null;
    private $mu = null;
    private $aw = null;
    private $kn = null;
    private $mv = false;
    private $mw = false;
    private $ax = null;
    private $mx = my::mz;
    private $n0 = null;
    private $n1 = null;
    private $n2 = null;
    private $in = -1;
    private $n3 = false;
    private $n4 = 0;
    private $n5 = false;
    private $n6 = 0;
    private $n7 = n8::n9;
    private $na = null;
    private $nb = null;
    private $nc = array();
    private $nd = null;
    private $ne;
    private $az = null;
    public function __construct($nf, $mu, $aw, $kn, $az)
    {
        $this->b0 = $nf;
        $this->mu = $mu;
        $this->aw = $aw;
        $this->kn = $kn;
        $this->az = $az;
        $this->ax = new ng($this->b0, $this);
        $this->ne = new kx();
        $this->n1 = new ic();
        if ($nf->nh() === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            $this->n0 = new hl();
        } else {
            $this->n0 = new hd();
            $this->n1->ie();
        }
    }
    public function ni()
    {
        $this->nd = uniqid();
        $nj = $this->mu->jq();
        $this->az->be("Connecting to the cluster member: " . $nj . ", using API version: " . Version::VERSION);
        $this->n2 = new at($this, $nj->je(), $nj->jf(), $this->ax, $this->nd, $this->az);
        $this->n2->b5();
    }
    public function ba()
    {
        if ($this->b0->nh() !== MigratoryDataClient::TRANSPORT_HTTP) {
            $g = $this->n0->h($this->mu->bg()->je(), $this->b0->b9());
            $this->n2->bj($g->ao());
        }
        $this->ax->nk($this->nd, nl::eq);
        $this->ax->nm();
        $this->nn();
    }
    public function nn()
    {
        $g = $this->n0->d($this->mu->bg()->je());
        $this->n1->ig($g, $this->b0->no(), $this->b0->np(), $this->b0->nq(), $this->b0->nr());
        $this->n0->f($g);
        $this->n2->bj($g->ao());
    }
    public function bc($ay, $ns, $nt)
    {
        if ($ay === $this->nd) {
            $this->mv = false;
            $this->az->br(by::c3 . $this->nd . " " . $nt);
            $this->nu();
            $this->nv();
            $this->ax->bc($this->nd, v::bd);
        }
    }
    public function nw($kh, $cl)
    {
        if (!isset($kh) || count($kh) == 0) {
            return;
        }
        $kh = v::kg($kh);
        $nx = array_diff($kh, $this->ne->l2());
        if (count($nx) == 0) {
            return 0;
        }
        $this->ne->kz($nx, $cl);
        if ($this->mv) {
            $this->ny($nx);
        }
    }
    private function ny($kh)
    {
        $g = $this->n0->d($this->mu->bg()->je());
        foreach ($kh as $j) {
            $this->nz($g, $this->ne->cz($j));
        }
        $this->n0->f($g);
        $this->n2->bj($g->ao());
    }
    private function nz($g, $j)
    {
        $this->n1->im($g, $j, $this->in);
    }
    public function o0($kh)
    {
        if (!isset($kh) || count($kh) == 0) {
            return;
        }
        $o1 = array_intersect($kh, $this->ne->l2());
        if (count($o1) == 0) {
            return;
        }
        $l1 = $this->ne->l0($o1);
        if ($this->mv) {
            $this->o2($l1);
        }
    }
    private function o2($kh)
    {
        $g = $this->n0->d($this->mu->bg()->je());
        foreach ($kh as $j) {
            $this->n1->ip($g, $this->in, $j);
        }
        $this->n0->f($g);
        $this->n2->bj($g->ao());
    }
    public function o3()
    {
        $this->nu();
        if ($this->mx == my::o4) {
            return;
        }
        $this->mu->jv($this->mu->bg());
        $this->mw = true;
        $this->ni();
    }
    public function nu()
    {
        $this->ax->o5();
        $this->dc();
        if (isset($this->n2)) {
            $this->n2->bk();
        }
        $this->n2 = null;
    }
    private function dc()
    {
        $this->mv = false;
        $this->in = -1;
        $this->n5 = false;
    }
    public function o6()
    {
        $this->mx = my::o4;
        $this->nu();
    }
    public function o7($is) {
        $g = $this->n0->d($this->mu->bg()->je());
        $this->n1->ir($g, $this->in, $is);
        $this->n0->f($g);
        $this->n2->bj($g->ao());        
    }
    public function o8($bq)
    {
        if (!$this->mv) {
            $this->o9(MigratoryDataClient::NOTIFY_PUBLISH_FAILED, $bq);
            return;
        }
        $this->oa($bq);
    }
    public function oa($bq)
    {
        $m = $bq->getReplySubject();
        if (strlen($m) > 0 && v::kf($m) && !$this->ne->l3($m)) {
            $this->nw(array($m), 0);
        }
        $g = $this->n0->d($this->mu->bg()->je());
        $this->n1->it($g, $bq, $this->in);
        $this->n0->f($g);
        if (isset($this->nb) && ($g->ap() - $g->a9()) > $this->nb) {
            $this->o9(MigratoryDataClient::NOTIFY_MESSAGE_SIZE_LIMIT_EXCEEDED, $bq);
            return;
        }
        $l = $bq->getClosure();
        if (isset($l) && strlen($l) > 0) {
            array_push($this->nc, $l);
        }
        $this->n2->bj($g->ao());
    }
    public function nv()
    {
        foreach ($this->nc as $l) {
            $this->az->br(by::c7 . $l);
            $this->kn->onStatus(MigratoryDataClient::NOTIFY_PUBLISH_FAILED, $l);
        }
        $this->nc = array();
    }
    public function ob()
    {
        $g = $this->n0->d($this->mu->bg()->je());
        $this->n1->iq($g, $this->in);
        $this->n0->f($g);
        $this->n2->bj($g->ao());
    }
    public function o9($oc, $bq)
    {
        if (isset($bq) && strlen($bq->getClosure()) > 0) {
            $this->kn->onStatus($oc, $bq->getClosure());
        }
    }
    public function od()
    {
        if ($this->mx != my::mz) {
            return;
        }
        $this->az->be("Call pause");
        $this->mx = my::oe;
        $this->nu();
    }
    public function of()
    {
        if ($this->mx != my::oe) {
            return;
        }
        $this->az->be("Call resume");
        $this->mx = my::mz;
        $this->og();
        $this->o3();
    }
    public function b3()
    {
        return $this->aw;
    }
    public function oh()
    {
        return $this->az;
    }
    public function bf()
    {
        return $this->mu;
    }
    public function bh()
    {
        return $this->nd;
    }
    public function oi($oj)
    {
        $this->nd = $oj;
    }
    public function ok()
    {
        return $this->mv;
    }
    public function ol()
    {
        return $this->n6;
    }
    public function om()
    {
        $this->n6++;
        return $this->n6;
    }
    public function on($mv)
    {
        $this->mv = $mv;
    }
    public function oo()
    {
        return $this->mx;
    }
    public function b4()
    {
        return $this->b0;
    }
    public function bb($g)
    {
        if ($this->b0->nh() === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            $m0 = lw::lx($g);
        } else {
            $m0 = lw::m6($g);
        }
        if (count($m0) > 0) {
            $this->op($m0);
        } else {
            $this->az->br(by::c0);
            $this->ax->nk($this->nd, nl::oq);
        }
    }
    private function op($m0)
    {
        foreach ($m0 as $bq) {
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
                    $this->os($bq);
                    break;
                case e8::ec:
                    $this->az->br(by::c0);
                    $this->ax->nk($this->nd, nl::oq);
                    break;
                case e8::em:
                    break;
                default:
                    $this->az->bs("No existing opeartion for message: " . $bq);
            }
        }
    }
    private function os($bq)
    {
        $this->ax->nk($this->nd, nl::oq);
        $df = $bq->dh();
        switch ($bq->dg()) {
            case e8::eb:
                $this->ot($df);
                break;
            case e8::e9:
                $this->ou($df);
                break;
            case e8::eq:
                $this->ov($df);
                break;
            case e8::ea:
                $this->ow($df);
                break;
            case e8::eh:
                $this->ox($df);
                break;
            case e8::c6:
                $this->oy($df);
                break;
            case e8::eg:
                $this->oz($df);
                break;
            case e8::er:
                $this->p0($df);
                break;    
            default:
                $this->az->bs("No existing opeartion for message: " . $bq);
        }
    }
    private function ot($df)
    {
        if (array_key_exists(et::eu, $df)) {
            $j = $df[et::eu];
            $kk = $this->ne->cz($j);
            if (!isset($kk)) {
                return;
            }
        }
        if (array_key_exists(et::fo, $df)) {
            $p1 = $df[et::fo];
            $this->p2($p1);
        }
        if (array_key_exists(et::ev, $df)) {
            $y = $df[et::ev];
        }
        $o = false;
        if (array_key_exists(et::fb, $df)) {
            $p3 = $df[et::fb];
            if ($p3 === 1) {
                $o = true;
            }
        }
        $r = false;
        if (array_key_exists(et::fq, $df)) {
            $p4 = $df[et::fq];
            if ($p4 === 1) {
                $r = true;
            }
        }
        if ($r) {
            $y = $this->n1->iz($y);
        }
        $p5 = MessageType::UPDATE;
        if (array_key_exists(et::fe, $df)) {
            $s = $df[et::fe];
            switch ($s) {
                case gx::gy:
                    $p5 = MessageType::SNAPSHOT;
                    break;
                case gx::h0:
                    $p5 = MessageType::RECOVERED;
                    break;
                case gx::h1:
                    $p5 = MessageType::HISTORICAL;
                    break;
            }
        }
        $n = QoS::GUARANTEED;
        if (array_key_exists(et::fc, $df)) {
            $p6 = $df[et::fc];
            if ($p6 === QoS::STANDARD) {
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
        if ($this->n7 == n8::p7 && $n == QoS::GUARANTEED) {
            $p8 = new jz($j, $y, $p5, $l, $n, $o, $m, $r);
            if (array_key_exists(et::ew, $df)) {
                $p = $df[et::ew];
            }
            if (array_key_exists(et::ex, $df)) {
                $cm = $df[et::ex];
            }
            $p8->cw($p);
            $p8->k0($cm);
            $p9 = v::kj($kk, $p, $cm, $this->kn, $this->az);
            if ($p9 == ko::kp) {
                $this->az->br(by::c4 . $p8);
                $this->kn->onMessage($p8);
            } else if ($p9 == ko::kr) {
                $this->bc($this->nd, v::k7, "seq_higher");
            }
        } else if ($this->n7 == n8::pa && $n == QoS::GUARANTEED) {
            $p8 = new jz($j, $y, $p5, $l, $n, $o, $m, $r);
            if (array_key_exists(et::ew, $df)) {
                $p = $df[et::ew];
            }
            if (array_key_exists(et::ex, $df)) {
                $cm = $df[et::ex];
            }
            $p8->cw($p);
            $p8->k0($cm);
            $p9 = v::ks($kk, $p, $cm, $this->kn, $this->az);
            if ($p9 == ko::kp) {
                $this->az->br(by::c4 . $p8);
                $this->kn->onMessage($p8);
            }            
        } else {
            $p8 = new jz($j, $y, $p5, "", $n, $o, $m, $r);
            $this->az->br(by::c4 . $p8);
            $this->kn->onMessage($p8);
        }
    }
    private function ou($df)
    {
    }
    private function p0($df) {
        $d5 = $df[et::f8];
        $be = $df[et::f7];
        $this->kn->onStatus($d5, $be);
    }
    private function ov($df)
    {
        if (array_key_exists(et::ez, $df)) {
            $in = $df[et::ez];
            $this->pb();
            $this->in = $in;
            $this->n5 = true;
            $this->n6 = 0;
            if (array_key_exists(et::fj, $df)) {
                $pc = $df[et::fj];
                if ($pc == 1) {
                    $this->n7 = n8::p7;
                } else if ($pc == 2) {
                    $this->n7 = n8::pa;
                }
            }
            if (array_key_exists(et::fh, $df)) {
                $pd = $df[et::fh];
                $this->ax->pe($pd);
                $this->ax->nk($this->nd, nl::oq);
            }
            $this->mv = true;
            if (array_key_exists(et::fo, $df)) {
                $p1 = $df[et::fo];
                $this->p2($p1);
            }
            if (array_key_exists(et::fp, $df)) {
                $this->nb = $df[et::fp];
            }
            $pf = "";
            if (array_key_exists(et::f8, $df)) {
                $pf = $df[et::f8];
            }
            $pg = MigratoryDataClient::NOTIFY_CONNECT_OK;
            if (array_key_exists(et::f3, $df)) {
                $bt = $df[et::f3];
                if ($bt == h8::hc) {
                    $pg = MigratoryDataClient::NOTIFY_CONNECT_DENY;
                }
            }
            $this->kn->onStatus($pg, $pf);
            $kh = $this->ne->l2();
            if (count($kh)) {
                $this->ny($kh);
            }
        }
    }
    private function og()
    {
        $this->n3 = false;
        $this->n4 = 0;
    }
    private function pb()
    {
        $this->az->be("Connected to cluster member: " . $this->mu->bg());
        $this->og();
        $this->az->br(by::c1 . MigratoryDataClient::NOTIFY_SERVER_UP . " " . $this->nd);
        $this->kn->onStatus(MigratoryDataClient::NOTIFY_SERVER_UP, $this->mu->bg()->jg());
    }
    public function ph($pi)
    {
        $this->az->bt("[" . $pi . "] [" . $this->mu->bg() . "]");
        $this->az->be("Lost connection with the cluster member: " . $this->mu->bg());
        if (!$this->n5) {
            $this->n4++;
            if (!$this->n3) {
                if ($this->n4 >= $this->b0->pj()) {
                    $this->az->br(by::c2 . $pi);
                    $this->n3 = true;
                    $this->kn->onStatus(MigratoryDataClient::NOTIFY_SERVER_DOWN, $this->mu->bg()->jg());
                }
            }
        }
    }
    private function p2($p1)
    {
        if (isset($this->na)) {
            if ($p1 !== $this->na) {
                $this->na = $p1;
                // reset epoch and seq
                $this->ne->l4();
            }
        } else {
            $this->na = $p1;
        }
    }
    private function ow($df)
    {
    }
    private function ox($df)
    {
        if (array_key_exists(et::f8, $df)
            && array_key_exists(et::eu, $df)) {
            $pk = $df[et::f8];
            $j = $df[et::eu];
            $pl = true;
            $pm = MigratoryDataClient::NOTIFY_SUBSCRIBE_DENY;
            if ($pk == h5::h7) {
                $pm = MigratoryDataClient::NOTIFY_SUBSCRIBE_ALLOW;
                $pl = false;
            } else if ($pk == h5::h6) {
                $pm = MigratoryDataClient::NOTIFY_SUBSCRIBE_DENY;
            }
            if ($pl) {
                $this->ne->l0(array($j));
            }
            $this->az->br(by::c8 . $j . " " . $pk . " " . $pm);
            $this->kn->onStatus($pm, $j);
        }
    }
    private function oy($df)
    {
        if (!isset($df)) {
            return;
        }
        if (array_key_exists(et::fi, $df)
            && array_key_exists(et::f8, $df)) {
            $l = $df[et::fi];
            $pn = $df[et::f8];
            $d5 = MigratoryDataClient::NOTIFY_PUBLISH_FAILED;
            if ($pn == v::k5) {
                $d5 = MigratoryDataClient::NOTIFY_PUBLISH_DENIED;
            } else if ($pn == v::k3) {
                $d5 = MigratoryDataClient::NOTIFY_PUBLISH_OK;
            }
            $this->az->br(by::c6 . $d5 . " " . $l);
            $this->kn->onStatus($d5, $l);
            $i6 = count($this->nc);
            for ($fx = 0; $fx < $i6; $fx++) {
                if ($l === $this->nc[$fx]) {
                    unset($this->nc[$fx]);
                }
            }
            $this->nc = array_values($this->nc);
        }
    }
    private function oz($df)
    {
        $j = "";
        if (array_key_exists(et::eu, $df)) {
            $j = $df[et::eu];
        }
        if (array_key_exists(et::fe, $df)) {
            $d5 = $df[et::fe];
        }
        $this->az->br("Recovery status for subject: " . $j . " is " . $d5);
        if (v::kc == $d5) {
            $kh = $this->ne->l2();
            foreach ($kh as $j) {
                $kk = $this->ne->cz($j);
                $po = $kk->d6();
                if (v::cr === $po ||
                    v::k9 === $po ||
                    v::k8 === $po) {
                    $kk->d3();
                } else {
                    $kk->d1();
                }
            }
        } else {
            $kk = $this->ne->cz($j);
            if (isset($kk)) {
                $kk->d4($d5);
            }
        }
    }
}
class ko
{
    const kp = 0;
    const kq = 1;
    const kr = 2;
}
class nl
{
    const eq = 0;
    const oq = 1;
}
class my
{
    const o4 = 0;
    const oe = 1;
    const mz = 2;
}
class n8
{
    const n9 = 0;
    const p7 = 1;
    const pa = 2;
}
class pp
{
    const pq = 30;
    const pr = 900;
    const ps = 10;
    private $pt = 3;
    private $pu = MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF;
    private $pv = 20;
    private $pw = 360;
    private $px = 5;
    private $fm = Version::VERSION;
    private $ii;
    private $ik;
    private $j9 = false;
    private $py = 1;
    private $is = "";
    private $pz = 1000;
    private $id = MigratoryDataClient::TRANSPORT_WEBSOCKET;
    private $kh = array();
    public function __construct($ii, $ik)
    {
        $this->ii = $ii;
        $this->ik = $ik;
    }
    public function q0($kh, $cl)
    {
        foreach ($kh as $j) {
            $this->kh[$j] = $cl;
        }
    }
    public function l0($kh)
    {
        foreach ($kh as $j) {
            if (array_key_exists($j, $this->kh)) {
                unset($this->kh[$j]);
            }
        }
    }
    public function q1()
    {
        return $this->kh;
    }
    public function nq()
    {
        return $this->fm;
    }
    public function np()
    {
        return $this->ii;
    }
    public function q2($j9)
    {
        $this->j9 = $j9;
    }
    public function b9()
    {
        return $this->j9;
    }
    public function q3($is)
    {
        $this->is = $is;
    }
    public function no()
    {
        return $this->is;
    }
    public function q4($id)
    {
        $this->id = $id;
    }
    public function nh()
    {
        return $this->id;
    }
    public function q5($pt)
    {
        $this->pt = $pt;
    }
    public function q6()
    {
        return $this->pt;
    }
    public function q7()
    {
        return $this->pu;
    }
    public function q8($pu)
    {
        $this->pu = $pu;
    }
    public function q9()
    {
        return $this->pv;
    }
    public function qa($pv)
    {
        $this->pv = $pv;
    }
    public function qb()
    {
        return $this->px;
    }
    public function qc($px)
    {
        $this->px = $px;
    }
    public function pj()
    {
        return $this->py;
    }
    public function qd($py)
    {
        $this->py = $py;
    }
    public function qe()
    {
        return $this->pw;
    }
    public function qf($pw)
    {
        $this->pw = $pw;
    }
    public function nr()
    {
        return $this->ik;
    }
    public function b7()
    {
        return $this->pz;
    }
    public function qg($pz)
    {
        $this->pz = $pz;
    }
}
class ng
{
    private $qh = null;
    private $qi = null;
    private $qj = null;
    private $b0;
    private $au;
    private $qk = pp::pq;
    public function __construct($nf, $au)
    {
        $this->b0 = $nf;
        $this->au = $au;
    }
    public function nk($oj, $ql)
    {
        if (isset($this->qh)) {
            $this->au->b3()->cancelTimer($this->qh);
        }
        $qm = $this->qk;
        if ($ql == nl::eq) {
            $qn = $this->au->ol();
            $qm = $this->qo($qn, true);
        }
        if ($qm > 0) {
            $this->qh = $this->au->b3()->addTimer($qm, function () use ($oj) {
                $nd = $this->au->bh();
                if (!isset($nd) || $nd !== $oj) {
                    return;
                }
                $this->au->on(false);
                $this->au->nu();
                $this->au->nv();
                $this->bc($nd, v::k6);
            });
        }
    }
    public function bc($oj, $pi)
    {
        if ($this->au->oo() != my::mz) {
            return;
        }
        $nd = $this->au->bh();
        if (!isset($nd) || $nd !== $oj) {
            return;
        }
        $this->au->oi(null);
        $this->au->ph($pi);
        $qn = $this->au->om();
        $qm = $this->qo($qn, false);
        $this->qp($qm, $pi);
    }
    public function qp($qq, $pi)
    {
        if (isset($this->qj)) {
            $this->au->b3()->cancelTimer($this->qj);
        }
        $this->qj = $this->au->b3()->addTimer($qq, function () use ($pi) {
            $this->au->o3();
        });
    }
    public function pe($ac)
    {
        $this->qk = $ac * 1.4;
    }
    public function nm()
    {
        if (isset($this->qi)) {
            $this->au->b3()->cancelTimer($this->qi);
        }
        $this->qi = $this->au->b3()->addTimer(pp::pr, function () {
            $this->au->ob();
            $this->nm();
        });
    }
    public function o5()
    {
        if (isset($this->qh)) {
            $this->au->b3()->cancelTimer($this->qh);
        }
        if (isset($this->qi)) {
            $this->au->b3()->cancelTimer($this->qi);
        }
        if (isset($this->qj)) {
            $this->au->b3()->cancelTimer($this->qj);
        }
    }
    private function qo($qn, $qr)
    {
        $qm = $this->qk;
        if ($qn > 0) {
            if ($qn <= $this->b0->q6()) {
                $qm = ($qn * $this->b0->qb()) - floor((mt_rand() / mt_getrandmax()) * $this->b0->qb());
            } else {
                if ($this->b0->q7() === MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF) {
                    $qs = $qn - $this->b0->q6();
                    $qm = min(($this->b0->q9() * (2 ** $qs)) - floor((mt_rand() / mt_getrandmax()) * $this->b0->q9() * $qs), $this->b0->qe());
                } else {
                    $qm = $this->b0->qt();
                }
            }
            if ($qr && $qm < pp::ps) {
                $qm = pp::ps;
            }
        }
        return $qm;
    }
}
class qu
{
    private $qv = 3;
    private $ff;
    private $qw = false;
    private $nf = null;
    private $au = null;
    private $jo = null;
    private $aw = null;
    private $qx = null;
    private $az = null;
    public function __construct()
    {
        $this->ff = "MigratoryDataClient/v6.0 React-PHP/" . phpversion() . ", version: " . Version::VERSION;
        $this->nf = new pp($this->qv, $this->ff);
        $this->az = new bu();
    }
    private function qy($me, $qz)
    {
        if (!isset($me)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: " . $qz . " - invalid first argument; expected an array of strings");
        }
        foreach ($me as $mm) {
            if (!is_string($mm)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: " . $qz . " - invalid first argument; expected an array of strings");
            }
        }
    }
    public function r0($aw)
    {
        if ($this->qw === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setLoop() method");
        }
        $this->aw = $aw;
    }
    public function q3($is)
    {
        if (trim($is) === '') {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setEntitlementToken() - invalid argument; expected a non-empty string");
        }
        $this->nf->q3($is);
        $this->az->be("Configuring entitlement token: " . $is);
        if ($this->qw === true) {
            $this->au->o7($is);
        }
    }
    public function r1($jo)
    {
        $this->qy($jo, "setServers()");
        if ($this->qw === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setServers() method");
        }
        if (!is_array($jo) || count($jo) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setServers() - invalid argument; expected a array of strings with size > 0");
        }
        foreach ($jo as $addr) {
            if (!isset($addr) || trim($addr) === '') {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setServers() - invalid argument; expected a array of strings with size > 0");
            }
        }
        $this->az->be("Setting servers to connect to: " . v::kt($jo));
        $this->jo = $jo;
    }
    public function r2($kn)
    {
        if ($this->qw === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setListener() method");
        }
        $this->qx = $kn;
    }
    public function r3($bv, $bw)
    {
        if ($bw < 0 || $bw > 4) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setLogListener() - invalid second argument; expected a MigratoryDataLogLevel");
        }
        if ($this->qw === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "Error: setLogListener() - already connected; use this method before connect()");
        }
        $this->az->bx($bv, $bw);
    }
    public function ni()
    {
        if ($this->qw === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "connect() method");
        }
        if (!isset($this->aw)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setLoop().");
        }
        if (!isset($this->qx)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setListener()");
        }
        if (!isset($this->jo)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setServers().");
        }
        $this->qw = true;
        $mu = new jk($this->jo, $this->nf->b9());
        $this->au = new mt($this->nf, $mu, $this->aw, $this->qx, $this->az);
        $this->au->ni();
        $kh = $this->nf->q1();
        $r4 = array_keys($kh);
        foreach ($r4 as $dl) {
            $this->au->nw(array($dl), $kh[$dl]);
            $this->az->br(by::cc . $dl);
        }
    }
    public function nu()
    {
        $this->az->be("Disconnect from push server and release all resources.");
        if ($this->qw === true) {
            $this->qw = false;
            $this->az->br(by::c9);
            $this->au->o6();
        }
    }
    public function nw($kh, $cl)
    {
        $this->qy($kh, "subscribe()");
        if (!isset($kh) || count($kh) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid first argument; expected a array of strings with size > 0");
        }
        foreach ($kh as $j) {
            if (is_null($j) || strlen($j) == 0 || !v::kf($j)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid argument; expected a valid topic with a non-empty value");
            }    
        }
        if ($cl < 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid second argument; a int with value >= 0");
        }
        $this->az->be("Subscribing to: " . v::kt($kh));
        $this->nf->q0($kh, $cl);
        if ($this->qw) {
            $this->az->br(by::cc . v::kt($kh));
            $this->au->nw($kh, $cl);
        }
    }
    public function o0($kh)
    {
        $this->qy($kh, "subscribe()");
        if (!isset($kh) || count($kh) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: unsubscribe() - invalid argument; expected a array of strings with size > 0");
        }
        foreach ($kh as $j) {
            if (is_null($j) || strlen($j) == 0 || !v::kf($j)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid argument; expected a valid topic with a non-empty value");
            }    
        }
        $this->az->be("Unsubscribing from: " . v::kt($kh));
        $this->nf->l0($kh);
        if ($this->qw) {
            $this->az->br(by::cd . v::kt($kh));
            $this->au->o0($kh);
        }
    }
    public function o8($bq)
    {
        if ($this->qw === false) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_CONNECTED, "publish() method");
        }
        $j = $bq->getSubject();
        $k = $bq->getContent();
        if (is_null($j) || strlen($j) == 0 || !v::kf($j)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: publish() - invalid argument; expected a valid message with a non-empty topic");
        }
        if (is_null($k) || strlen($k) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: publish() - invalid argument; expected a valid message with a non-empty content");
        }
        $this->az->br(by::ce . $bq);
        $this->au->o8($bq);
    }
    public function od()
    {
        if (!$this->qw) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "pause() method");
        }
        $this->az->be("Migratorydata client calls pause");
        $this->az->br(by::ca);
        $this->au->od();
    }
    public function of()
    {
        if (!$this->qw) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "resume() method");
        }
        $this->az->be("Migratorydata client calls resume");
        $this->az->br(by::cb);
        $this->au->of();
    }
    public function q1()
    {
        return array_keys($this->nf->q1());
    }
    public function r5($d8)
    {
        if ($d8 !== MigratoryDataClient::TRANSPORT_HTTP && $d8 !== MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Argument for set_transport must be MigratoryDataClient::TRANSPORT_WEBSOCKET or MigratoryDataClient::TRANSPORT_HTTP");
        }
        if ($this->qw === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setTransport() method");
        }
        $this->nf->q4($d8);
        $this->az->be("Configuring transport type to: " . $d8);
    }
    public function q2($i)
    {
        if ($this->qw === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setEncryption() method");
        }
        $this->nf->q2($i);
        $this->az->be("Configuring encryption to: " . v::w($i));
    }
    public function q5($dp)
    {
        if ($this->qw === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setQuickReconnectMaxRetries() method");
        }
        if ($dp < 2) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setQuickReconnectMaxRetries() - invalid argument; expected an integer higher or equal to 2");
        }
        $this->au->q5($dp);
        $this->az->be("Configuring quickreconnect max retries to: " . $dp);
    }
    public function q8($r6)
    {
        if ($this->qw === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectPolicy() method");
        }
        if (!isset($r6) || ($r6 !== MigratoryDataClient::CONSTANT_WINDOWS_BACKOFF && $r6 !== MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectPolicy() - invalid argument; expected MigratoryDataClient.CONSTANT_WINDOW_BACKOFF or MigratoryDataClient.TRUNCATED_EXPONENTIAL_BACKOFF");
        }
        $this->nf->q8($r6);
        $this->az->be("Configuring reconnect policy to: " . $r6);
    }
    public function qa($r7)
    {
        if ($this->qw === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectTimeInterval() method");
        }
        if ($r7 < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectTimeInterval() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->nf->qa($r7);
        $this->az->be("Configuring setReconnectTime interval to: " . $r7);
    }
    public function r8($ib)
    {
        if ($this->qw === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "notifyAfterFailedConnectionAttempts() method");
        }
        if ($ib < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: notifyAfterFailedConnectionAttempts() - invalid argument; expected a positive integer");
        }
        $this->nf->qd($ib);
        $this->az->be("Configuring the number of failed connection attempts before sending a notification: " . $ib);
    }
    public function qf($r9)
    {
        if ($this->qw === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectMaxDelay() method");
        }
        if ($r9 < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectMaxDelay() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->nf->qf($r9);
        $this->az->be("Configuring setReconnectMax delay to: " . $r9);
    }
    public function qc($r7)
    {
        if ($this->qw === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setQuickReconnectInitialDelay() method");
        }
        if ($r7 < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setQuickReconnectInitialDelay() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->nf->qc($r7);
        $this->az->be("Configuring quickReconnectInitial delay to: " . $r7);
    }
    public function ra()
    {
        return $this->qx;
    }
    public function rb($pz)
    {
        if ($this->qw === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setConnectionTimeout() method");
        }
        $this->nf->qg($pz);
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
    private $rc = null;
    public function __construct()
    {
        $this->rc = new qu();
    }
    public function setLoop(\React\EventLoop\LoopInterface $aw)
    {
        $this->rc->r0($aw);
    }
    public function setListener(MigratoryDataListener $kn)
    {
        $this->rc->r2($kn);
    }
    public function setLogListener(MigratoryDataLogListener $bv, int $bw)
    {
        $this->rc->r3($bv, $bw);
    }
    public function setEntitlementToken(string $is)
    {
        $this->rc->q3($is);
    }
    public function setServers(array $jo)
    {
        $this->rc->r1($jo);
    }
    public function connect()
    {
        $this->rc->ni();
    }
    public function disconnect()
    {
        $this->rc->nu();
    }
    public function subscribe(array $kh)
    {
        $this->rc->nw($kh, 0);
    }
    public function subscribeWithHistory(array $kh, int $rd)
    {
        $this->rc->nw($kh, $rd);
    }
    public function unsubscribe(array $kh)
    {
        $this->rc->o0($kh);
    }
    public function publish(MigratoryDataMessage $bq)
    {
        $this->rc->o8($bq);
    }
    public function pause()
    {
        $this->rc->od();
    }
    public function resume()
    {
        $this->rc->of();
    }
    public function setTransport(string $d8)
    {
        $this->rc->r5($d8);
    }
    public function setEncryption(bool $i)
    {
        $this->rc->q2($i);
    }
    public function getSubjects()
    {
        return $this->rc->q1();
    }
    public function getListener()
    {
        return $this->rc->ra();
    }
    public function setQuickReconnectMaxRetries(int $qn)
    {
        $this->rc->q5($qn);
    }
    public function setReconnectPolicy(string $r6)
    {
        $this->rc->q8($r6);
    }
    public function setReconnectTimeInterval(int $re)
    {
        $this->rc->qa($re);
    }
    public function notifyAfterFailedConnectionAttempts(int $qn)
    {
        $this->rc->r8($qn);
    }
    public function setReconnectMaxDelay(int $re)
    {
        $this->rc->qf($re);
    }
    public function setQuickReconnectInitialDelay(int $re)
    {
        $this->rc->qc($re);
    }
    public function setConnectionTimeout(int $pz)
    {
        $this->rc->rb($pz);
    }
}
