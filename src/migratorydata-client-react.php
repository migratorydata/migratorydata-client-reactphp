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
        self::$dy = array_fill(0, 128, -1);
        self::$dy[er::es] = 0x01;
        self::$dy[er::et] = 0x02;
        self::$dy[er::eu] = 0x03;
        self::$dy[er::ev] = 0x04;
        self::$dy[er::ew] = 0x05;
        self::$dy[er::ex] = 0x06;
        self::$dy[er::ey] = 0x07;
        self::$dy[er::ez] = 0x08;
        self::$dy[er::f0] = 0x09;
        self::$dy[er::f1] = 0x0B;
        self::$dy[er::f2] = 0x0C;
        self::$dy[er::f3] = 0x0F;
        self::$dy[er::f4] = 0x12;
        self::$dy[er::f5] = 0x13;
        self::$dy[er::f6] = 0x14;
        self::$dy[er::f7] = 0x15;
        self::$dy[er::f8] = 0x16;
        self::$dy[er::f9] = 0x17;
        self::$dy[er::fa] = 0x18;
        self::$dy[er::fb] = 0x1A;
        self::$dy[er::fc] = 0x27;
        self::$dy[er::fd] = 0x23;
        self::$dy[er::fe] = 0x24;
        self::$dy[er::ff] = 0x25;
        self::$dy[er::fg] = 0x10;
        self::$dy[er::fh] = 0x11;
        self::$dy[er::fi] = 0x28;
        self::$dy[er::fj] = 0x2C;
        self::$dy[er::fk] = 0x2D;
        self::$dy[er::fl] = 0x30;
        self::$dy[er::fm] = 0x1D;
        self::$dy[er::fn] = 0x26;
        self::$e1 = array_fill(0, 128, -1);
        self::fo(er::es, fp::fq);
        self::fo(er::et, fp::fr);
        self::fo(er::eu, fp::fs);
        self::fo(er::ev, fp::fs);
        self::fo(er::ew, fp::fs);
        self::fo(er::ex, fp::fs);
        self::fo(er::ey, fp::fr);
        self::fo(er::ez, fp::fr);
        self::fo(er::f0, fp::fr);
        self::fo(er::f1, fp::fs);
        self::fo(er::f2, fp::fr);
        self::fo(er::f3, fp::fs);
        self::fo(er::f4, fp::fq);
        self::fo(er::f5, fp::fq);
        self::fo(er::f6, fp::fq);
        self::fo(er::f7, fp::fs);
        self::fo(er::f8, fp::fs);
        self::fo(er::f9, fp::fs);
        self::fo(er::fa, fp::fs);
        self::fo(er::fb, fp::fq);
        self::fo(er::fc, fp::fq);
        self::fo(er::fd, fp::fq);
        self::fo(er::fe, fp::fs);
        self::fo(er::ff, fp::fs);
        self::fo(er::fg, fp::fq);
        self::fo(er::fh, fp::fs);
        self::fo(er::fi, fp::fs);
        self::fo(er::fj, fp::fq);
        self::fo(er::fk, fp::fs);
        self::fo(er::fl, fp::fq);
        self::fo(er::fm, fp::fs);
        self::fo(er::fn, fp::fs);
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
            $e = self::ft($i);
            if ($e != -1) {
                self::$dz[$e] = $i;
            }
        }
        self::$df = array_fill(0, 128, -1);
        for ($fu = 0; $fu <= er::fn; $fu++) {
            self::$df[self::fv($fu)] = $fu;
        }
        self::$e2 = array_fill(0, 128, -1);
        for ($fu = 0; $fu <= e8::eq; $fu++) {
            self::$e2[self::fw($fu)] = $fu;
        }
    }
    public static function fx($y)
    {
        $fy = array_merge(unpack('C*', $y));
        $fz = 0;
        for ($fu = 0; $fu < count($fy); $fu++) {
            $g0 = self::ft($fy[$fu]);
            if ($g0 != -1) {
                $fz++;
            }
        }
        if ($fz == 0) {
            return call_user_func_array("pack", array_merge(array("C*"), $fy));
        }
        $g1 = array_fill(0, count($fy) + $fz, 0);
        for ($fu = 0, $g2 = 0; $fu < count($fy); $fu++, $g2++) {
            $g0 = self::ft($fy[$fu]);
            if ($g0 != -1) {
                $g1[$g2] = self::e6;
                $g1[$g2 + 1] = $g0;
                $g2++;
            } else {
                $g1[$g2] = $fy[$fu];
            }
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g1));
    }
    public static function g3($y)
    {
        $fy = array_merge(unpack('C*', $y));
        $fz = 0;
        if (count($fy) == 0) {
            return $y;
        }
        for ($fu = 0; $fu < count($fy); $fu++) {
            if ($fy[$fu] == self::e6) {
                $fz++;
            }
        }
        $g1 = array_fill(0, count($fy) - $fz, 0);
        for ($fu = 0, $g2 = 0; $fu < count($fy); $fu++, $g2++) {
            $g4 = $fy[$fu];
            if ($g4 == self::e6) {
                if ($fu + 1 < count($fy)) {
                    $g1[$g2] = self::g5($fy[$fu + 1]);
                    if ($g1[$g2] == -1) {
                        throw new \InvalidArgumentException();
                    }
                    $fu++;
                } else {
                    throw new \InvalidArgumentException();
                }
            } else {
                $g1[$g2] = $g4;
            }
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g1));
    }
    public static function g6($y, $g7, $g8)
    {
        $g9 = null;
        $ga = strpos($y, chr(self::fv($g7)));
        $gb = strpos($y, chr(self::e5), $ga);
        if ($ga !== false && $gb !== false) {
            $gc = substr($y, $ga + 1, $gb - ($ga + 1));
            switch ($g8) {
                case fp::gd:
                    $g9 = $gc;
                    break;
                case fp::fr:
                    $g9 = $gc;
                    break;
                case fp::fq:
                    $g9 = $gc;
                    break;
                case fp::fs:
                    $g9 = self::ge($gc);
                    break;
            }
        }
        return $g9;
    }
    public static function ge($gf)
    {
        $y = array_merge(unpack("C*", $gf));
        $g1 = 0;
        $gg = -1;
        $gh = 0;
        $gi;
        $g4;
        $gj = count($y);
        $ab = 0;
        if ($gj == 1) {
            return $y[0];
        } else if ($gj == 2 && $y[$ab] == self::e6) {
            $g4 = self::g5($y[$ab + 1]);
            if ($g4 != -1) {
                return $g4;
            } else {
                throw new \InvalidArgumentException();
            }
        }
        for (; $gj > 0; $gj--) {
            $g4 = $y[$ab];
            $ab++;
            if ($g4 == self::e6) {
                if ($gj - 1 < 0) {
                    throw new \InvalidArgumentException();
                }
                $gj--;
                $g4 = $y[$ab];
                $ab++;
                $gi = self::g5($g4);
                if ($gi == -1) {
                    throw new \InvalidArgumentException();
                }
            } else {
                $gi = $g4;
            }
            if ($gg > 0) {
                $gh |= $gi >> $gg;
                $g1 = $g1 << 8 | ($gh >= 0 ? $gh : $gh + 256);
                $gh = ($gi << (8 - $gg));
            } else {
                $gh = ($gi << -$gg);
            }
            $gg = ($gg + 7) % 8;
        }
        return $g1;
    }
    public static function gk($gh)
    {
        if (($gh & 0xFFFFFF80) == 0) {
            $i = self::ft($gh);
            if ($i == -1) {
                return pack('C*', $gh);
            } else {
                return pack('C*', self::e6, $i);
            }
        }
        $gl = 0;
        if (($gh & 0xFF000000) != 0) {
            $gl = 24;
        } else if (($gh & 0x00FF0000) != 0) {
            $gl = 16;
        } else {
            $gl = 8;
        }
        $g1 = array_fill(0, 10, 0);
        $gm = 0;
        $gn = 0;
        while ($gl >= 0) {
            $b = (($gh >> $gl) & 0xFF);
            $gn++;
            $g1[$gm] |= ($b >= 0 ? $b : $b + 256) >> $gn;
            $g0 = self::ft($g1[$gm]);
            if ($g0 != -1) {
                $g1[$gm] = self::e6;
                $g1[$gm + 1] = $g0;
                $gm++;
            }
            $gm++;
            $g1[$gm] |= ($b << (7 - $gn)) & 0x7F;
            $gl -= 8;
        }
        $g0 = self::ft($g1[$gm]);
        if ($g0 != -1) {
            $g1[$gm] = self::e6;
            $g1[$gm + 1] = $g0;
            $gm++;
        }
        $gm++;
        if ($gm < count($g1)) {
            $g1 = array_slice($g1, 0, $gm);
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g1));
    }
    public static function g5($b)
    {
        return $b >= 0 ? self::$dz[$b] : -1;
    }
    public static function ft($b)
    {
        return $b >= 0 ? self::$e0[$b] : -1;
    }
    public static function fv($h)
    {
        return self::$dy[$h];
    }
    public static function go($g4)
    {
        return self::$df[$g4];
    }
    public static function fw($o)
    {
        return self::$dx[$o];
    }
    public static function dg($g4)
    {
        return self::$e2[$g4];
    }
    public static function gp()
    {
        return self::e3;
    }
    public static function fo($gq, $gr)
    {
        self::$e1[dw::fv($gq)] = $gr;
    }
    public static function gs($gq)
    {
        $gt = self::fv($gq);
        return self::$e1[$gt];
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
}
class er
{
    const es = 0;
    const et = 1;
    const eu = 2;
    const ev = 3;
    const ew = 4;
    const ex = 5;
    const ey = 6;
    const ez = 7;
    const f0 = 8;
    const f1 = 9;
    const f2 = 10;
    const f3 = 11;
    const f4 = 12;
    const f5 = 13;
    const f6 = 14;
    const f7 = 15;
    const f8 = 16;
    const f9 = 17;
    const fa = 18;
    const fb = 19;
    const fc = 20;
    const fd = 21;
    const fe = 22;
    const ff = 23;
    const fg = 24;
    const fh = 25;
    const fi = 26;
    const fj = 27;
    const fk = 28;
    const fl = 29;
    const fm = 30;
    const fn = 31;
}
class fp
{
    const gd = 0;
    const fr = 1;
    const fq = 2;
    const fs = 3;
}
class gu
{
    const gv = "1";
    const gw = "2";
    const gx = "3";
    const gy = "4";
}
class gz
{
    const h0 = 4;
    const h1 = 8;
}
class h2
{
    const h3 = "d";
    const h4 = "a";
}
dw::e7();
class h5 implements c
{
	private $h6 = "POST / HTTP/1.1";
	private $h7 = "Host: ";
	private $h8 = "Content-Length: ";
	private $h9 = "00000";
	private $ha = "\r\n";
	public function __construct()
	{
	}
	public function d($e)
	{
		$g = new x();
		$g->a6($this->h6);
		$g->a6($this->ha);
		$g->a6($this->h7);
		$g->a6(dw::fx($e));
		$g->a6($this->ha);
		$g->a6($this->h8);
		$g->ae();
		$g->a6($this->h9);
		$g->a6($this->ha);
		$g->a6($this->ha);
		$g->af();
		return $g;
	}
	public function f($g)
	{
		$ab = $g->ap();
		$hb = strval($ab - $g->aj());
		if (strlen($hb) <= strlen($this->h9)) {
			$b0 = 0;
			for ($fu = strlen($this->h9) - strlen($hb); $fu < strlen($this->h9); $fu++) {
				$g->aa($g->ai() + $fu, $hb[$b0]);
				$b0++;
			}
		} else {
			$hc = substr($g->an(), 0, $g->ai());
			$hc .= $hb;
			$hc .= substr($g->an(), $g->ai() + strlen($this->h9));
			$g->am($hc);
		}
	}
	public function h($e, $i)
	{
		return "";
	}
}
class hd implements c
{
	private $he = "GET /WebSocketConnection HTTP/1.1";
	private $hf = "GET /WebSocketConnection-Secure HTTP/1.1";
	private $h7 = "Host: ";
	private $hg = "Origin: ";
	private $hh = "Upgrade: websocket";
	private $hi = "Sec-WebSocket-Key: 23eds34dfvce4";
	private $hj = "Sec-WebSocket-Version: 13";
	private $hk = "Sec-WebSocket-Protocol: pushv1";
	private $hl = "Connection: Upgrade";
	private $ha = "\r\n";
	private $hm = 10;
	private $hn = -128;
	private $ho = -128;
	private $hp = 0x02;
	public function __construct()
	{
	}
	public function d($e)
	{
		$g = new x();
		for ($fu = 0; $fu < $this->hm; $fu++) {
			$g->a6(chr(0x00));
		}
		for ($fu = 0; $fu < 4; $fu++) {
			$hq = chr(rand(0, 100));
			$g->a6($hq);
			$g->a7($hq);
		}
		$g->ag();
		return $g;
	}
	public function f($g)
	{
		$hr = chr($this->hn) | chr($this->hp);
		$g->ah();
		$hs = $g->al() - $g->ak();
		$ht = $this->hu($hs);
		$hv = $this->hw($hs, $ht);
		$hx = 0;
		if ($ht === 1) {
			$hx = 8;
			$g->aa($hx, $hr);
			$g->aa($hx + 1, $hv[0] | chr($this->ho));
		} else if ($ht === 2) {
			$hx = 6;
			$g->aa($hx, $hr);
			$g->aa($hx + 1, chr(126) | chr($this->ho));
			for ($fu = 0; $fu <= 1; $fu++) {
				$g->aa($hx + 2 + $fu, $hv[$fu]);
			}
		} else {
			$g->aa($hx, $hr);
			$g->aa($hx + 1, chr(127) | chr($this->ho));
			for ($fu = 0; $fu <= 7; $fu++) {
				$g->aa($hx + 2 + $fu, $hv[$fu]);
			}
		}
		$g->a3($hx);
	}
	public function h($e, $i)
	{
		$g = new x();
		if (!$i) {
			$g->a6($this->he);
		} else {
			$g->a6($this->hf);
		}
		$g->a6($this->ha);
		$g->a6($this->hg);
		$g->a6("http://" . $e);
		$g->a6($this->ha);
		$g->a6($this->h7);
		$g->a6($e);
		$g->a6($this->ha);
		$g->a6($this->hh);
		$g->a6($this->ha);
		$g->a6($this->hl);
		$g->a6($this->ha);
		$g->a6($this->hi);
		$g->a6($this->ha);
		$g->a6($this->hj);
		$g->a6($this->ha);
		$g->a6($this->hk);
		$g->a6($this->ha);
		$g->a6($this->ha);
		return $g;
	}
	private function hu($hy)
	{
		if ($hy <= 125) {
			return 1;
		} else if ($hy <= 65535) {
			return 2;
		}
		return 8;
	}
	private function hw($ac, $ht)
	{
		$g = "";
		$hz = 8 * $ht - 8;
		for ($fu = 0; $fu < $ht; $fu++) {
			$i0 = $this->i1($ac, $hz - 8 * $fu);
			$i2 = $i0 - (256 * intval($i0 / 256));
			$g .= chr($i2);
		}
		return $g;
	}
	private function i1($gh, $i3)
	{
		return ($gh % 0x100000000) >> $i3;
	}
}
class i4
{
    private $ew = gz::h1;
    private $i5 = MigratoryDataClient::TRANSPORT_WEBSOCKET;
    public function __construct()
    {
    }
    public function i6()
    {
        $this->i5 = MigratoryDataClient::TRANSPORT_HTTP;
        $this->ew = gz::h0;
    }
    public function i7($g, $i8, $i9, $ia, $ib)
    {
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fw(e8::eq)));
        } else {
            $g->a6(chr(dw::fw(e8::eq)) ^ $g->a8());
        }
        if (strlen($i8) > 0) {
            $g->a6($this->ic(dw::fv(er::f5), dw::fx($i8), $g));
        }
        $g->a6($this->ic(dw::fv(er::fe), dw::gk($i9), $g));
        $g->a6($this->ic(dw::fv(er::fd), dw::fx($ib), $g));
        $g->a6($this->ic(dw::fv(er::fk), dw::gk($ia), $g));
        $g->a6($this->ic(dw::fv(er::ew), dw::gk($this->ew), $g));
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    public function id($g, $j, $ie)
    {
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fw(e8::e9)));
        } else {
            $g->a6(chr(dw::fw(e8::e9)) ^ $g->a8());
        }
        $g->a6($this->ic(dw::fv(er::es), dw::fx($j->cz()), $g));
        if (isset($ie) && $ie >= 0) {
            $g->a6($this->ic(dw::fv(er::ex), dw::gk($ie), $g));
        }
        $ig = $j->d7();
        switch ($ig) {
            case ct::cu:
                break;
            case ct::d9:
                $g->a6($this->ic(dw::fv(er::fi), dw::gk($j->d0()), $g));
                break;
            case ct::da:
                $g->a6($this->ic(dw::fv(er::ev), dw::gk($j->cx()), $g));
                $g->a6($this->ic(dw::fv(er::eu), dw::gk($j->cv() + 1), $g));
                break;
        }
        $g->a6($this->ic(dw::fv(er::ew), dw::gk($this->ew), $g));
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    public function ih($g, $ie, $j)
    {
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fw(e8::ea)));
        } else {
            $g->a6(chr(dw::fw(e8::ea)) ^ $g->a8());
        }
        $g->a6($this->ic(dw::fv(er::es), dw::fx($j), $g));
        if ($ie > 0) {
            $g->a6($this->ic(dw::fv(er::ex), dw::gk($ie), $g));
        }
        $g->a6($this->ic(dw::fv(er::ew), dw::gk($this->ew), $g));
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    public function ii($g, $ie)
    {
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fw(e8::ea)));
        } else {
            $g->a6(chr(dw::fw(e8::ea)) ^ $g->a8());
        }
        if ($ie > 0) {
            $g->a6($this->ic(dw::fv(er::ex), dw::gk($ie), $g));
        }
        $g->a6($this->ic(dw::fv(er::ew), dw::gk($this->ew), $g));
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    public function ij($g, $bq, $ik)
    {
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::fw(e8::em)));
        } else {
            $g->a6(chr(dw::fw(e8::em)) ^ $g->a8());
        }
        $g->a6($this->ic(dw::fv(er::es), dw::fx($bq->getSubject()), $g));
        if ($bq->isCompressed()) {
            $il = $this->im($bq->getContent());
            if (strlen($il) < strlen($bq->getContent())) {
                $g->a6($this->ic(dw::fv(er::et), dw::fx($il), $g));
            } else {
                $g->a6($this->ic(dw::fv(er::et), dw::fx($bq->getContent()), $g));
                $bq->setCompressed(false);
            }
        } else {
            $g->a6($this->ic(dw::fv(er::et), dw::fx($bq->getContent()), $g));
        }
        $m = $bq->getReplySubject();
        if (strlen($m) > 0) {
            $g->a6($this->ic(dw::fv(er::fj), dw::fx($m), $g));
        }
        $l = $bq->getClosure();
        if (strlen($l) > 0) {
            $g->a6($this->ic(dw::fv(er::fg), dw::fx($l), $g));
        }
        $g->a6($this->ic(dw::fv(er::ex), dw::gk($ik), $g));
        if ($bq->getQos() == QoS::GUARANTEED) {
            $g->a6($this->ic(dw::fv(er::fa), dw::gk(QoS::GUARANTEED), $g));
        } else {
            $g->a6($this->ic(dw::fv(er::fa), dw::gk(QoS::STANDARD), $g));
        }
        if ($bq->isRetained() == true) {
            $g->a6($this->ic(dw::fv(er::f9), dw::gk(1), $g));
        } else {
            $g->a6($this->ic(dw::fv(er::f9), dw::gk(0), $g));
        }
        if ($bq->isCompressed()) {
            $g->a6($this->ic(dw::fv(er::fn), dw::gk(1), $g));
        }
        $g->a6($this->ic(dw::fv(er::ew), dw::gk($this->ew), $g));
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dw::e4));
        } else {
            $g->a6(chr(dw::e4) ^ $g->a8());
        }
    }
    private function ic($g9, $y, $g)
    {
        $g1 = '';
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g1 .= chr($g9);
            $g1 .= $y;
            $g1 .= chr(dw::e5);
        } else {
            $g1 .= chr($g9) ^ $g->a8();
            for ($fu = 0; $fu < strlen($y); $fu++) {
                $g1 .= $y[$fu] ^ $g->a8();
            }
            $g1 .= chr(dw::e5) ^ $g->a8();
        }
        return $g1;
    }
    public function im($k)
    {
        $in = gzdeflate($k);
        if ($in === false) {
            return $k;
        }
        $io = base64_encode($in);
        return $io;
    }
    public function ip($y)
    {
        $iq = base64_decode($y);
        if ($iq === false) {
            return $y;
        }
        $ir = gzinflate($iq);
        if ($ir === false) {
            return $y;
        }
        return $ir;
    }
}
class is
{
    const it = 80;
    const iu = 443;
    const iv = 100;
    private $e;
    private $av;
    private $iw;
    private $ix = self::iv;
    public function __construct($iy, $iz)
    {
        $this->iw = $iy;
        $j0 = explode(" ", $iy, 2);
        if (count($j0) == 2) {
            $ix = intval($j0[0]);
            if ($ix <= 0 || $ix > 100) {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "the weight of a cluster member must be between 0 and 100, weight: " . $ix);
            }
            $this->ix = intval($j0[0]);
            $iy = $j0[1];
        }
        $j1 = strrpos($iy, '/');
        $j2 = $j1 === false ? $iy : substr($iy, $j1 + 1);
        $j3 = strrpos($j2, ':');
        if ($j3 !== false) {
            $this->e = substr($j2, 0, $j3);
            $this->av = intval(substr($j2, $j3 + 1));
            if ($this->av < 0 || $this->av > 65535) {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $iy . " - invalid port number");
            }
            if ($this->e === "") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "Cluster member with null address");
            }
            if ($this->e === "*") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $iy . " - wildcard address (*) cannot be used to define a cluster member");
            }
        } else {
            $this->e = $j2;
            if ($this->e === "") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "Cluster member with null address");
            }
            if ($this->e === "*") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $iy . " - wildcard address (*) cannot be used to define a cluster member");
            }
            if ($iz === false) {
                $this->av = self::it;
            } else {
                $this->av = self::iu;
            }
        }
    }
    public function j4()
    {
        return $this->e;
    }
    public function j5()
    {
        return $this->av;
    }
    public function j6()
    {
        return $this->iw;
    }
    public function j7()
    {
        return $this->ix;
    }
    public function j8($j9)
    {
        if ($this->j4() === $j9->j4()) {
            if ($this->j5() === $j9->j5()) {
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
class ja
{
    private $jb = array();
    private $jc = array();
    private $jd = null;
    public function __construct($je, $iz)
    {
        foreach ($je as $jf) {
            $this->jb[] = new is($jf, $iz);
        }
    }
    public function jg()
    {
        $jh = $this->ji();
        if (count($jh) === 0) {
            $this->jc = array();
            $jh = $this->jb;
        }
        $jj = $this->jk($jh);
        $this->jd = $jh[$jj];
        return $this->jd;
    }
    public function jl($j9)
    {
        array_push($this->jc, $j9);
    }
    public function bg()
    {
        return $this->jd;
    }
    private function ji()
    {
        $jh = array();
        foreach ($this->jb as $j9) {
            $jm = true;
            foreach ($this->jc as $jn) {
                if ($j9->j8($jn)) {
                    $jm = false;
                }
            }
            if ($jm) {
                array_push($jh, $j9);
            }
        }
        return $jh;
    }
    private function jk($jh)
    {
        $jj = -1;
        $jo = 0;
        foreach ($jh as $j9) {
            $jo = $jo + $j9->j7();
        }
        if ($jo === 0) {
            $jj = floor(count($jh) * (mt_rand() / mt_getrandmax()));
        } else {
            $ix = floor($jo * (mt_rand() / mt_getrandmax()));
            $jo = 0;
            $fu = 0;
            foreach ($jh as $j9) {
                $jo = $jo + $j9->j7();
                if ($jo > $ix) {
                    $jj = $fu;
                    break;
                }
                $fu++;
            }
        }
        return $jj;
    }
}
class jp extends MigratoryDataMessage
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
    public function jq($q)
    {
        $this->q = $q;
    }
    public function jr()
    {
        return $this->q;
    }
}
class v
{
    const js = "NOT_SUBSCRIBED";
    const jt = "OK";
    const ju = "FAILED";
    const jv = "DENY";
    const bd = "connection_passive_close";
    const jw = "connection_active_close_keep_alive";
    const jx = "connection_active_close_seq_higher";
    const bi = "connection_error";
    const cr = "cache_ok";
    const jy = "cache_ok_no_new_message";
    const jz = "cache_ok_new_epoch";
    const k0 = "no_cache";
    const k1 = "no_seq";
    const k2 = "end";
    const k3 = '/^\/([^\/]+\/)*([^\/]+|\*)$/';
    const k4 = "\r\n\r\n";
    const h8 = "Content-Length: ";
    public static function k5($gc)
    {
        return preg_match(self::k3, $gc);
    }
    public static function k6($k7)
    {
        $k8 = array();
        foreach ($k7 as $j) {
            if (isset($j) && v::k5($j)) {
                array_push($k8, $j);
            }
        }
        return $k8;
    }
    public static function k9($ka, $kb, $kc, $kd, $az)
    {
        // different epoch, reset and continue.
        if ($ka->cx() !== $kc) {
            $ka->cw($kb);
            $ka->cy($kc);
            return ke::kf;
        }
        // if received seq is equal or smaller than the local seq then the message is ignored
        if ($kb <= $ka->cv()) {
            return ke::kg;
        }
        // if received seq is +1 than the local seq then the message is processed
        if ($kb === ($ka->cv() + 1)) {
            if ($ka->cs() == ct::da) {
                $ka->db();
                $kd->onStatus(MigratoryDataClient::NOTIFY_DATA_SYNC, $ka->cz());
                $az->br(by::c4 . MigratoryDataClient::NOTIFY_DATA_SYNC . $ka);
            }
            $ka->cw($ka->cv() + 1);
            return ke::kf;
        }
        // there is a hole in the order of the messages
        // if there is a missing message when the session is active, then we disconnect the client and make failover.
        if ($ka->cp() > 0) {
            $az->br("Missing messages: expected message with sequence number: " . ($ka->cv() + 1) . ", received instead message with sequence number:  " . $kb . " !");
            return ke::kh;
        }
        $az->br("Reset sequence: '" . ($ka->cv() + 1) . "'. The new sequence is: '" . $kb . "' !");
        $ka->cw($kb);
        $kd->onStatus(MigratoryDataClient::NOTIFY_DATA_RESYNC, $ka->cz());
        $az->br(by::c4 . MigratoryDataClient::NOTIFY_DATA_RESYNC . " " . $ka);
        return ke::kf;
    }
    public static function ki($ka, $kb, $kc, $kd, $az)
    {
        // different epoch, reset and continue.
        if ($ka->cx() !== $kc) {
            $ka->cw($kb);
            $ka->cy($kc);
            return ke::kf;
        }
        // if received seq is equal or smaller than the local seq then the message is ignored
        if ($kb <= $ka->cv()) {
            return ke::kg;
        }
        if ($ka->cs() == ct::da) {
            $ka->db();
        }
        $ka->cw($kb);
        return ke::kf;
    }
    public static function kj($kk)
    {
        $kl = "";
        if (count($kk) > 0) {
            $kl .= "[";
            for ($fu = 0; $fu < count($kk); $fu++) {
                $kl .= $kk[$fu];
                if ($fu + 1 != count($kk)) {
                    $kl .= ", ";
                }
            }
            $kl .= "]";
        }
        return $kl;
    }
    public static function w($km)
    {
        if ($km) {
            return "true";
        }
        return "false";
    }
}
class kn
{
    private $ko = array();
    public function kp($k7, $cl)
    {
        foreach ($k7 as $j) {
            if (!array_key_exists($j, $this->ko)) {
                $ka = new cj($j, $cl);
                $this->ko[$j] = $ka;
            }
        }
    }
    public function kq($k7)
    {
        $kr = array();
        foreach ($k7 as $j) {
            if (array_key_exists($j, $this->ko)) {
                unset($this->ko[$j]);
                array_push($kr, $j);
            }
        }
        return $kr;
    }
    public function ks()
    {
        return array_keys($this->ko);
    }
    public function cz($j)
    {
        if (array_key_exists($j, $this->ko)) {
            return $this->ko[$j];
        }
        return null;
    }
    public function kt($j)
    {
        return array_key_exists($j, $this->ko);
    }
    public function ku()
    {
        $kv = array_values($this->ko);
        foreach ($kv as $kw) {
            $kw->dc();
        }
    }
}
class kx
{
    private $ky;
    private $kz;
    public function __construct($ky, $kz)
    {
        $this->ky = $ky;
        $this->kz = $kz;
    }
    public function l0()
    {
        return $this->ky;
    }
    public function l1()
    {
        return $this->kz;
    }
}
class l2
{
    public static function l3($g)
    {
        $l4 = l2::l5($g, 0);
        $ab = $l4->l0();
        if ($g->ap() < $l4->l1()) {
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
    public static function l5($g, $a3)
    {
        $l6 = new kx(-1, -1);
        if ($a3 == $g->ap()) {
            return $l6;
        }
        $ab = $a3;
        $l7 = 2;
        $l8 = 0;
        $l9 = 0;
        $la = $g->ap() - $ab;
        if ($la < $l7) {
            return $l6;
        }
        $g4 = dw::ge($g->ad($ab));
        $hr = ($g4 >> 7) & 0x01;
        $lb = $g4 & 0x40;
        $lc = $g4 & 0x20;
        $ld = $g4 & 0x10;
        if ($hr !== 1 || $lb != 0 || $lc != 0 || $ld != 0) {
            return $l6;
        }
        $ab++;
        $g4 = dw::ge($g->ad($ab));
        $le = $g4 & 0x7F;
        if ($le < 126) {
            $l9 = 0;
            $l8 = $le;
        } else if ($le === 126) {
            $l9 = 2;
            if ($la < $l7 + $l9) {
                return $l6;
            }
            $lf = "";
            for ($fu = $ab + 1; $fu <= $ab + $l9; $fu++) {
                $lf .= $g->ad($fu);
            }
            $l8 = l2::lg($lf);
            $ab += $l9;
        } else {
            $l9 = 8;
            if ($la < $l7 + $l9) {
                return $l6;
            }
            $lf = "";
            for ($fu = $ab + 1; $fu <= $ab + $l9; $fu++) {
                $lf .= $g->ad($fu);
            }
            $l8 = l2::lg($lf);
            $ab += $l9;
        }
        if ($la < ($l7 + $l9 + $l8)) {
            return $l6;
        }
        $ab += 1;
        return new kx($ab, $ab + $l8);
    }
    private static function lg($y)
    {
        if (strlen($y) === 2) {
            return (ord($y[0] & chr(0xFF)) << 8) | ord($y[1] & chr(0xFF));
        } else {
            $lh = ord($y[4] & chr(0x7F)) << 24;
            $li = ord($y[5] & chr(0xFF)) << 16;
            $lj = ord($y[6] & chr(0xFF)) << 8;
            $lk = ord($y[7] & chr(0xFF));
            $ll = $lh | $li | $lj | $lk;
            return $ll;
        }
    }
}
class lm
{
    public static function ln($g)
    {
        $lo = $g->a9();
        if ($g->ad($lo) == "H") {
            $lo = self::lp($g);
        }
        if ($lo == -1) {
            return array();
        }
        $g->a3($lo);
        $lq = array();
        while (true) {
            if ($lo >= $g->ap()) {
                return $lq;
            }
            if (dw::ge($g->ad($lo)) == dw::gp()) {
                $lo++;
            } else {
                $l4 = l2::l5($g, $lo);
                $lr = $l4->l0();
                $ls = $l4->l1();
                if ($lr == -1) {
                    return $lq;
                }
                while (true) {
                    $fu = self::lt($g, $lr, $ls, chr(dw::e4));
                    if ($fu == -1) {
                        break;
                    }
                    $df = self::lu($g, $lr + 1, $fu);
                    if ($df != null) {
                        $lv = new dd(dw::dg(ord($g->ad($lr))), $df);
                        array_push($lq, $lv);
                    }
                    $lr = $fu + 1;
                    $g->a3($lr);
                }
                $lo = $g->a9();
            }
        }
    }
    public static function lw($g)
    {
        $lo = lm::lx($g);
        if ($lo == -1) {
            return array();
        }
        $g->a3($lo);
        $lq = array();
        $ab = $g->a9();
        while (true) {
            $fu = self::lt($g, $ab, $g->ap(), chr(dw::e4));
            if ($fu == -1) {
                break;
            }
            $ly = $g->ad($ab);
            if ($ly == "H") {
                $lz = lm::lw($g);
                foreach ($lz as $m0) {
                    array_push($lq, $m0);
                }
                break;
            }
            $df = lm::lu($g, $ab + 1, $fu);
            $lv = new dd(dw::dg(ord($g->ad($ab))), $df);
            array_push($lq, $lv);
            $ab = $fu + 1;
            $g->a3($ab);
        }
        return $lq;
    }
    public static function lu($g, $ky, $kz)
    {
        $df = null;
        while (true) {
            if ($ky >= $kz) {
                break;
            }
            $gq = ord($g->ad($ky));
            $m1 = self::lt($g, $ky + 1, $kz, chr(dw::e5));
            if ($m1 == -1) {
                return null;
            }
            $g9 = dw::go($gq);
            if ($g9 === null) {
                $ky = $m1 + 1;
                continue;
            }
            $ky++;
            if ($df == null) {
                $df = array();
            }
            $ac = null;
            $m2 = substr($g->an(), $ky, $m1 - $ky);
            switch (dw::gs($g9)) {
                case fp::fs:
                    $ac = dw::ge($m2);
                    break;
                case fp::fq:
                    $ac = dw::g3($m2);
                    break;
                case fp::fr:
                    $ac = dw::g3($m2);
                    break;
                case fp::gd:
                    $ac = $m2;
                    break;
            }
            if (!array_key_exists($g9, $df)) {
                $df[$g9] = $ac;
            } else {
                $m3 = $df[$g9];
                if (is_array($m3)) {
                    array_push($m3, $ac);
                } else {
                    $m4 = array();
                    array_push($m4, $m3);
                    array_push($m4, $ac);
                    $df[$g9] = $m4;
                }
            }
            $ky = $m1 + 1;
        }
        return $df;
    }
    public static function lx($g)
    {
        $m5 = $g->a9();
        $y = $g->ao();
        $m6 = dw::fx(v::h8);
        $ab = lm::m7($m6, $y);
        if ($ab == -1) {
            return -1;
        }
        $ab += strlen($m6);
        $m8 = "\r";
        $m9 = lm::lt($g, $ab, $g->ap(), $m8);
        if ($m9 == -1) {
            return -1;
        }
        $ma = substr($y, $ab, $m9 - $ab);
        $mb = intval($ma);
        $ab = lm::m7(v::k4, $y);
        if ($ab == -1) {
            return $ab;
        }
        $ab += strlen(v::k4);
        if (($ab + $mb) > strlen($y)) {
            return -1;
        }
        return $m5 + $ab;
    }
    private static function lt($g, $ky, $kz, $mc)
    {
        for ($fu = $ky; $fu < $kz; $fu++) {
            $x = $g->ad($fu);
            if ($g->ad($fu) == $mc) {
                return $fu;
            }
        }
        return -1;
    }
    private static function m7($md, $me)
    {
        $m0 = strlen($md);
        $i3 = strlen($me);
        $mf = array_fill(0, $m0, 0);
        lm::mg($md, $m0, $mf);
        $fu = 0;
        $g2 = 0;
        while ($fu < $i3) {
            if ($md[$g2] == $me[$fu]) {
                $g2++;
                $fu++;
            }
            if ($g2 == $m0) {
                return $fu - $g2;
            } else if ($fu < $i3 && $md[$g2] != $me[$fu]) {
                if ($g2 != 0)
                    $g2 = $mf[$g2 - 1];
                else
                    $fu = $fu + 1;
            }
        }
        return -1;
    }
    private static function mg($md, $m0, &$mf)
    {
        $gj = 0;
        $mf[0] = 0;
        $fu = 1;
        while ($fu < $m0) {
            if ($md[$fu] == $md[$gj]) {
                $gj++;
                $mf[$fu] = $gj;
                $fu++;
            } else {
                if ($gj != 0) {
                    $gj = $mf[$gj - 1];
                } else {
                    $mf[$fu] = 0;
                    $fu++;
                }
            }
        }
    }
    private static function lp($g)
    {
        $mh = "\r\n\r\n";
        $ab = $g->a9();
        $fu = self::m7($mh, $g->ao());
        if ($fu == -1) {
            return -1;
        }
        $ab = $fu + strlen($mh);
        return $ab;
    }
}
class Version
{
        //      6       mi   xx   mi xxx
    // push version mi API ID mi API version
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
	const VERSION = 607001;
}
class mj
{
    private $b0 = null;
    private $e = null;
    private $mk = null;
    private $aw = null;
    private $kd = null;
    private $ml = false;
    private $mm = false;
    private $ax = null;
    private $mn = mo::mp;
    private $mq = null;
    private $mr = null;
    private $ms = null;
    private $ie = -1;
    private $mt = false;
    private $mu = 0;
    private $mv = false;
    private $mw = 0;
    private $mx = my::mz;
    private $n0 = null;
    private $n1 = null;
    private $n2 = array();
    private $n3 = null;
    private $n4;
    private $az = null;
    public function __construct($n5, $mk, $aw, $kd, $az)
    {
        $this->b0 = $n5;
        $this->mk = $mk;
        $this->aw = $aw;
        $this->kd = $kd;
        $this->az = $az;
        $this->ax = new n6($this->b0, $this);
        $this->n4 = new kn();
        $this->mr = new i4();
        if ($n5->n7() === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            $this->mq = new hd();
        } else {
            $this->mq = new h5();
            $this->mr->i6();
        }
    }
    public function n8()
    {
        $this->n3 = uniqid();
        $n9 = $this->mk->jg();
        $this->az->be("Connecting to the cluster member: " . $n9 . ", using API version: " . Version::VERSION);
        $this->ms = new at($this, $n9->j4(), $n9->j5(), $this->ax, $this->n3, $this->az);
        $this->ms->b5();
    }
    public function ba()
    {
        if ($this->b0->n7() !== MigratoryDataClient::TRANSPORT_HTTP) {
            $g = $this->mq->h($this->mk->bg()->j4(), $this->b0->b9());
            $this->ms->bj($g->ao());
        }
        $this->ax->na($this->n3, nb::eq);
        $this->ax->nc();
        $this->nd();
    }
    public function nd()
    {
        $g = $this->mq->d($this->mk->bg()->j4());
        $this->mr->i7($g, $this->b0->ne(), $this->b0->nf(), $this->b0->ng(), $this->b0->nh());
        $this->mq->f($g);
        $this->ms->bj($g->ao());
    }
    public function bc($ay, $ni, $nj)
    {
        if ($ay === $this->n3) {
            $this->ml = false;
            $this->az->br(by::c3 . $this->n3 . " " . $nj);
            $this->nk();
            $this->nl();
            $this->ax->bc($this->n3, v::bd);
        }
    }
    public function nm($k7, $cl)
    {
        if (!isset($k7) || count($k7) == 0) {
            return;
        }
        $k7 = v::k6($k7);
        $nn = array_diff($k7, $this->n4->ks());
        if (count($nn) == 0) {
            return 0;
        }
        $this->n4->kp($nn, $cl);
        if ($this->ml) {
            $this->no($nn);
        }
    }
    private function no($k7)
    {
        $g = $this->mq->d($this->mk->bg()->j4());
        foreach ($k7 as $j) {
            $this->np($g, $this->n4->cz($j));
        }
        $this->mq->f($g);
        $this->ms->bj($g->ao());
    }
    private function np($g, $j)
    {
        $this->mr->id($g, $j, $this->ie);
    }
    public function nq($k7)
    {
        if (!isset($k7) || count($k7) == 0) {
            return;
        }
        $nr = array_intersect($k7, $this->n4->ks());
        if (count($nr) == 0) {
            return;
        }
        $kr = $this->n4->kq($nr);
        if ($this->ml) {
            $this->ns($kr);
        }
    }
    private function ns($k7)
    {
        $g = $this->mq->d($this->mk->bg()->j4());
        foreach ($k7 as $j) {
            $this->mr->ih($g, $this->ie, $j);
        }
        $this->mq->f($g);
        $this->ms->bj($g->ao());
    }
    public function nt()
    {
        $this->nk();
        if ($this->mn == mo::nu) {
            return;
        }
        $this->mk->jl($this->mk->bg());
        $this->mm = true;
        $this->n8();
    }
    public function nk()
    {
        $this->ax->nv();
        $this->dc();
        if (isset($this->ms)) {
            $this->ms->bk();
        }
        $this->ms = null;
    }
    private function dc()
    {
        $this->ml = false;
        $this->ie = -1;
        $this->mv = false;
    }
    public function nw()
    {
        $this->mn = mo::nu;
        $this->nk();
    }
    public function nx($bq)
    {
        if (!$this->ml) {
            $this->ny(MigratoryDataClient::NOTIFY_PUBLISH_FAILED, $bq);
            return;
        }
        $this->nz($bq);
    }
    public function nz($bq)
    {
        $m = $bq->getReplySubject();
        if (strlen($m) > 0 && v::k5($m) && !$this->n4->kt($m)) {
            $this->nm(array($m), 0);
        }
        $g = $this->mq->d($this->mk->bg()->j4());
        $this->mr->ij($g, $bq, $this->ie);
        $this->mq->f($g);
        if (isset($this->n1) && ($g->ap() - $g->a9()) > $this->n1) {
            $this->ny(MigratoryDataClient::NOTIFY_MESSAGE_SIZE_LIMIT_EXCEEDED, $bq);
            return;
        }
        $l = $bq->getClosure();
        if (isset($l) && strlen($l) > 0) {
            array_push($this->n2, $l);
        }
        $this->ms->bj($g->ao());
    }
    public function nl()
    {
        foreach ($this->n2 as $l) {
            $this->az->br(by::c7 . $l);
            $this->kd->onStatus(MigratoryDataClient::NOTIFY_PUBLISH_FAILED, $l);
        }
        $this->n2 = array();
    }
    public function o0()
    {
        $g = $this->mq->d($this->mk->bg()->j4());
        $this->mr->ii($g, $this->ie);
        $this->mq->f($g);
        $this->ms->bj($g->ao());
    }
    public function ny($o1, $bq)
    {
        if (isset($bq) && strlen($bq->getClosure()) > 0) {
            $this->kd->onStatus($o1, $bq->getClosure());
        }
    }
    public function o2()
    {
        if ($this->mn != mo::mp) {
            return;
        }
        $this->az->be("Call pause");
        $this->mn = mo::o3;
        $this->nk();
    }
    public function o4()
    {
        if ($this->mn != mo::o3) {
            return;
        }
        $this->az->be("Call resume");
        $this->mn = mo::mp;
        $this->o5();
        $this->nt();
    }
    public function b3()
    {
        return $this->aw;
    }
    public function o6()
    {
        return $this->az;
    }
    public function bf()
    {
        return $this->mk;
    }
    public function bh()
    {
        return $this->n3;
    }
    public function o7($o8)
    {
        $this->n3 = $o8;
    }
    public function o9()
    {
        return $this->ml;
    }
    public function oa()
    {
        return $this->mw;
    }
    public function ob()
    {
        $this->mw++;
        return $this->mw;
    }
    public function oc($ml)
    {
        $this->ml = $ml;
    }
    public function od()
    {
        return $this->mn;
    }
    public function b4()
    {
        return $this->b0;
    }
    public function bb($g)
    {
        if ($this->b0->n7() === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            $lq = lm::ln($g);
        } else {
            $lq = lm::lw($g);
        }
        if (count($lq) > 0) {
            $this->oe($lq);
        } else {
            $this->az->br(by::c0);
            $this->ax->na($this->n3, nb::of);
        }
    }
    private function oe($lq)
    {
        foreach ($lq as $bq) {
            switch ($bq->dg()) {
                case e8::eb:
                case e8::eh:
                case e8::c6:
                case e8::eg:
                case e8::eq:
                case e8::e9:
                case e8::ea:
                    $this->az->br(by::bz . " " . $bq);
                    $this->og($bq);
                    break;
                case e8::ec:
                    $this->az->br(by::c0);
                    $this->ax->na($this->n3, nb::of);
                    break;
                case e8::em:
                    break;
                default:
                    $this->az->bs("No existing opeartion for message: " . $bq);
            }
        }
    }
    private function og($bq)
    {
        $this->ax->na($this->n3, nb::of);
        $df = $bq->dh();
        switch ($bq->dg()) {
            case e8::eb:
                $this->oh($df);
                break;
            case e8::e9:
                $this->oi($df);
                break;
            case e8::eq:
                $this->oj($df);
                break;
            case e8::ea:
                $this->ok($df);
                break;
            case e8::eh:
                $this->ol($df);
                break;
            case e8::c6:
                $this->om($df);
                break;
            case e8::eg:
                $this->on($df);
                break;
            default:
                $this->az->bs("No existing opeartion for message: " . $bq);
        }
    }
    private function oh($df)
    {
        if (array_key_exists(er::es, $df)) {
            $j = $df[er::es];
            $ka = $this->n4->cz($j);
            if (!isset($ka)) {
                return;
            }
        }
        if (array_key_exists(er::fl, $df)) {
            $oo = $df[er::fl];
            $this->op($oo);
        }
        if (array_key_exists(er::et, $df)) {
            $y = $df[er::et];
        }
        $o = false;
        if (array_key_exists(er::f9, $df)) {
            $oq = $df[er::f9];
            if ($oq === 1) {
                $o = true;
            }
        }
        $r = false;
        if (array_key_exists(er::fn, $df)) {
            $os = $df[er::fn];
            if ($os === 1) {
                $r = true;
            }
        }
        if ($r) {
            $y = $this->mr->ip($y);
        }
        $ot = MessageType::UPDATE;
        if (array_key_exists(er::fc, $df)) {
            $s = $df[er::fc];
            switch ($s) {
                case gu::gv:
                    $ot = MessageType::SNAPSHOT;
                    break;
                case gu::gx:
                    $ot = MessageType::RECOVERED;
                    break;
                case gu::gy:
                    $ot = MessageType::HISTORICAL;
                    break;
            }
        }
        $n = QoS::GUARANTEED;
        if (array_key_exists(er::fa, $df)) {
            $ou = $df[er::fa];
            if ($ou === QoS::STANDARD) {
                $n = QoS::STANDARD;
            }
        }
        $l = "";
        if (array_key_exists(er::fg, $df)) {
            $l = $df[er::fg];
        }
        $m = "";
        if (array_key_exists(er::fj, $df)) {
            $m = $df[er::fj];
        }
        if ($this->mx == my::ov && $n == QoS::GUARANTEED) {
            $ow = new jp($j, $y, $ot, $l, $n, $o, $m, $r);
            if (array_key_exists(er::eu, $df)) {
                $p = $df[er::eu];
            }
            if (array_key_exists(er::ev, $df)) {
                $cm = $df[er::ev];
            }
            $ow->cw($p);
            $ow->jq($cm);
            $ox = v::k9($ka, $p, $cm, $this->kd, $this->az);
            if ($ox == ke::kf) {
                $this->az->br(by::c4 . $ow);
                $this->kd->onMessage($ow);
            } else if ($ox == ke::kh) {
                $this->bc($this->n3, v::jx, "seq_higher");
            }
        } else if ($this->mx == my::oy && $n == QoS::GUARANTEED) {
            $ow = new jp($j, $y, $ot, $l, $n, $o, $m, $r);
            if (array_key_exists(er::eu, $df)) {
                $p = $df[er::eu];
            }
            if (array_key_exists(er::ev, $df)) {
                $cm = $df[er::ev];
            }
            $ow->cw($p);
            $ow->jq($cm);
            $ox = v::ki($ka, $p, $cm, $this->kd, $this->az);
            if ($ox == ke::kf) {
                $this->az->br(by::c4 . $ow);
                $this->kd->onMessage($ow);
            }            
        } else {
            $ow = new jp($j, $y, $ot, "", $n, $o, $m, $r);
            $this->az->br(by::c4 . $ow);
            $this->kd->onMessage($ow);
        }
    }
    private function oi($df)
    {
    }
    private function oj($df)
    {
        if (array_key_exists(er::ex, $df)) {
            $ie = $df[er::ex];
            $this->oz();
            $this->ie = $ie;
            $this->mv = true;
            $this->mw = 0;
            if (array_key_exists(er::fh, $df)) {
                $p0 = $df[er::fh];
                if ($p0 == 1) {
                    $this->mx = my::ov;
                } else if ($p0 == 2) {
                    $this->mx = my::oy;
                }
            }
            if (array_key_exists(er::ff, $df)) {
                $p1 = $df[er::ff];
                $this->ax->p2($p1);
                $this->ax->na($this->n3, nb::of);
            }
            $this->ml = true;
            if (array_key_exists(er::fl, $df)) {
                $oo = $df[er::fl];
                $this->op($oo);
            }
            if (array_key_exists(er::fm, $df)) {
                $this->n1 = $df[er::fm];
            }
            $k7 = $this->n4->ks();
            if (count($k7)) {
                $this->no($k7);
            }
        }
    }
    private function o5()
    {
        $this->mt = false;
        $this->mu = 0;
    }
    private function oz()
    {
        $this->az->be("Connected to cluster member: " . $this->mk->bg());
        $this->o5();
        $this->az->br(by::c1 . MigratoryDataClient::NOTIFY_SERVER_UP . " " . $this->n3);
        $this->kd->onStatus(MigratoryDataClient::NOTIFY_SERVER_UP, $this->mk->bg()->j6());
    }
    public function p3($p4)
    {
        $this->az->bt("[" . $p4 . "] [" . $this->mk->bg() . "]");
        $this->az->be("Lost connection with the cluster member: " . $this->mk->bg());
        if (!$this->mv) {
            $this->mu++;
            if (!$this->mt) {
                if ($this->mu >= $this->b0->p5()) {
                    $this->az->br(by::c2 . $p4);
                    $this->mt = true;
                    $this->kd->onStatus(MigratoryDataClient::NOTIFY_SERVER_DOWN, $this->mk->bg()->j6());
                }
            }
        }
    }
    private function op($oo)
    {
        if (isset($this->n0)) {
            if ($oo !== $this->n0) {
                $this->n0 = $oo;
                // reset epoch and seq
                $this->n4->ku();
            }
        } else {
            $this->n0 = $oo;
        }
    }
    private function ok($df)
    {
    }
    private function ol($df)
    {
        if (array_key_exists(er::f6, $df)
            && array_key_exists(er::es, $df)) {
            $p6 = $df[er::f6];
            $j = $df[er::es];
            $p7 = true;
            $p8 = MigratoryDataClient::NOTIFY_SUBSCRIBE_DENY;
            if ($p6 == h2::h4) {
                $p8 = MigratoryDataClient::NOTIFY_SUBSCRIBE_ALLOW;
                $p7 = false;
            } else if ($p6 == h2::h3) {
                $p8 = MigratoryDataClient::NOTIFY_SUBSCRIBE_DENY;
            }
            if ($p7) {
                $this->n4->kq(array($j));
            }
            $this->az->br(by::c8 . $j . " " . $p6 . " " . $p8);
            $this->kd->onStatus($p8, $j);
        }
    }
    private function om($df)
    {
        if (!isset($df)) {
            return;
        }
        if (array_key_exists(er::fg, $df)
            && array_key_exists(er::f6, $df)) {
            $l = $df[er::fg];
            $p9 = $df[er::f6];
            $d5 = MigratoryDataClient::NOTIFY_PUBLISH_FAILED;
            if ($p9 == v::jv) {
                $d5 = MigratoryDataClient::NOTIFY_PUBLISH_DENIED;
            } else if ($p9 == v::jt) {
                $d5 = MigratoryDataClient::NOTIFY_PUBLISH_OK;
            }
            $this->az->br(by::c6 . $d5 . " " . $l);
            $this->kd->onStatus($d5, $l);
            $hy = count($this->n2);
            for ($fu = 0; $fu < $hy; $fu++) {
                if ($l === $this->n2[$fu]) {
                    unset($this->n2[$fu]);
                }
            }
            $this->n2 = array_values($this->n2);
        }
    }
    private function on($df)
    {
        $j = "";
        if (array_key_exists(er::es, $df)) {
            $j = $df[er::es];
        }
        if (array_key_exists(er::fc, $df)) {
            $d5 = $df[er::fc];
        }
        $this->az->br("Recovery status for subject: " . $j . " is " . $d5);
        if (v::k2 == $d5) {
            $k7 = $this->n4->ks();
            foreach ($k7 as $j) {
                $ka = $this->n4->cz($j);
                $pa = $ka->d6();
                if (v::cr === $pa ||
                    v::jz === $pa ||
                    v::jy === $pa) {
                    $ka->d3();
                } else {
                    $ka->d1();
                }
            }
        } else {
            $ka = $this->n4->cz($j);
            if (isset($ka)) {
                $ka->d4($d5);
            }
        }
    }
}
class ke
{
    const kf = 0;
    const kg = 1;
    const kh = 2;
}
class nb
{
    const eq = 0;
    const of = 1;
}
class mo
{
    const nu = 0;
    const o3 = 1;
    const mp = 2;
}
class my
{
    const mz = 0;
    const ov = 1;
    const oy = 2;
}
class pb
{
    const pc = 30;
    const pd = 900;
    const pe = 10;
    private $pf = 3;
    private $pg = MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF;
    private $ph = 20;
    private $pi = 360;
    private $pj = 5;
    private $fk = Version::VERSION;
    private $i9;
    private $ib;
    private $iz = false;
    private $pk = 1;
    private $pl = "";
    private $pm = 1000;
    private $i5 = MigratoryDataClient::TRANSPORT_WEBSOCKET;
    private $k7 = array();
    public function __construct($i9, $ib)
    {
        $this->i9 = $i9;
        $this->ib = $ib;
    }
    public function pn($k7, $cl)
    {
        foreach ($k7 as $j) {
            $this->k7[$j] = $cl;
        }
    }
    public function kq($k7)
    {
        foreach ($k7 as $j) {
            if (array_key_exists($j, $this->k7)) {
                unset($this->k7[$j]);
            }
        }
    }
    public function po()
    {
        return $this->k7;
    }
    public function ng()
    {
        return $this->fk;
    }
    public function nf()
    {
        return $this->i9;
    }
    public function pp($iz)
    {
        $this->iz = $iz;
    }
    public function b9()
    {
        return $this->iz;
    }
    public function pq($pl)
    {
        $this->pl = $pl;
    }
    public function ne()
    {
        return $this->pl;
    }
    public function pr($i5)
    {
        $this->i5 = $i5;
    }
    public function n7()
    {
        return $this->i5;
    }
    public function ps($pf)
    {
        $this->pf = $pf;
    }
    public function pt()
    {
        return $this->pf;
    }
    public function pu()
    {
        return $this->pg;
    }
    public function pv($pg)
    {
        $this->pg = $pg;
    }
    public function pw()
    {
        return $this->ph;
    }
    public function px($ph)
    {
        $this->ph = $ph;
    }
    public function py()
    {
        return $this->pj;
    }
    public function pz($pj)
    {
        $this->pj = $pj;
    }
    public function p5()
    {
        return $this->pk;
    }
    public function q0($pk)
    {
        $this->pk = $pk;
    }
    public function q1()
    {
        return $this->pi;
    }
    public function q2($pi)
    {
        $this->pi = $pi;
    }
    public function nh()
    {
        return $this->ib;
    }
    public function b7()
    {
        return $this->pm;
    }
    public function q3($pm)
    {
        $this->pm = $pm;
    }
}
class n6
{
    private $q4 = null;
    private $q5 = null;
    private $q6 = null;
    private $b0;
    private $au;
    private $q7 = pb::pc;
    public function __construct($n5, $au)
    {
        $this->b0 = $n5;
        $this->au = $au;
    }
    public function na($o8, $q8)
    {
        if (isset($this->q4)) {
            $this->au->b3()->cancelTimer($this->q4);
        }
        $q9 = $this->q7;
        if ($q8 == nb::eq) {
            $qa = $this->au->oa();
            $q9 = $this->qb($qa, true);
        }
        if ($q9 > 0) {
            $this->q4 = $this->au->b3()->addTimer($q9, function () use ($o8) {
                $n3 = $this->au->bh();
                if (!isset($n3) || $n3 !== $o8) {
                    return;
                }
                $this->au->oc(false);
                $this->au->nk();
                $this->au->nl();
                $this->bc($n3, v::jw);
            });
        }
    }
    public function bc($o8, $p4)
    {
        if ($this->au->od() != mo::mp) {
            return;
        }
        $n3 = $this->au->bh();
        if (!isset($n3) || $n3 !== $o8) {
            return;
        }
        $this->au->o7(null);
        $this->au->p3($p4);
        $qa = $this->au->ob();
        $q9 = $this->qb($qa, false);
        $this->qc($q9, $p4);
    }
    public function qc($qd, $p4)
    {
        if (isset($this->q6)) {
            $this->au->b3()->cancelTimer($this->q6);
        }
        $this->q6 = $this->au->b3()->addTimer($qd, function () use ($p4) {
            $this->au->nt();
        });
    }
    public function p2($ac)
    {
        $this->q7 = $ac * 1.4;
    }
    public function nc()
    {
        if (isset($this->q5)) {
            $this->au->b3()->cancelTimer($this->q5);
        }
        $this->q5 = $this->au->b3()->addTimer(pb::pd, function () {
            $this->au->o0();
            $this->nc();
        });
    }
    public function nv()
    {
        if (isset($this->q4)) {
            $this->au->b3()->cancelTimer($this->q4);
        }
        if (isset($this->q5)) {
            $this->au->b3()->cancelTimer($this->q5);
        }
        if (isset($this->q6)) {
            $this->au->b3()->cancelTimer($this->q6);
        }
    }
    private function qb($qa, $qe)
    {
        $q9 = $this->q7;
        if ($qa > 0) {
            if ($qa <= $this->b0->pt()) {
                $q9 = ($qa * $this->b0->py()) - floor((mt_rand() / mt_getrandmax()) * $this->b0->py());
            } else {
                if ($this->b0->pu() === MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF) {
                    $qf = $qa - $this->b0->pt();
                    $q9 = min(($this->b0->pw() * (2 ** $qf)) - floor((mt_rand() / mt_getrandmax()) * $this->b0->pw() * $qf), $this->b0->q1());
                } else {
                    $q9 = $this->b0->qg();
                }
            }
            if ($qe && $q9 < pb::pe) {
                $q9 = pb::pe;
            }
        }
        return $q9;
    }
}
class qh
{
    private $qi = 3;
    private $fd;
    private $qj = false;
    private $n5 = null;
    private $au = null;
    private $je = null;
    private $aw = null;
    private $qk = null;
    private $az = null;
    public function __construct()
    {
        $this->fd = "MigratoryDataClient/v6.0 React-PHP/" . phpversion() . ", version: " . Version::VERSION;
        $this->n5 = new pb($this->qi, $this->fd);
        $this->az = new bu();
    }
    private function ql($m4, $qm)
    {
        if (!isset($m4)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: " . $qm . " - invalid first argument; expected an array of strings");
        }
        foreach ($m4 as $mc) {
            if (!is_string($mc)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: " . $qm . " - invalid first argument; expected an array of strings");
            }
        }
    }
    public function qn($aw)
    {
        if ($this->qj === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setLoop() method");
        }
        $this->aw = $aw;
    }
    public function pq($pl)
    {
        if ($this->qj === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setEntitlementToken() method");
        }
        if (trim($pl) === '') {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setEntitlementToken() - invalid argument; expected a non-empty string");
        }
        $this->n5->pq($pl);
        $this->az->be("Configuring entitlement token: " . $pl);
    }
    public function qo($je)
    {
        $this->ql($je, "setServers()");
        if ($this->qj === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setServers() method");
        }
        if (!is_array($je) || count($je) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setServers() - invalid argument; expected a array of strings with size > 0");
        }
        foreach ($je as $addr) {
            if (!isset($addr) || trim($addr) === '') {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setServers() - invalid argument; expected a array of strings with size > 0");
            }
        }
        $this->az->be("Setting servers to connect to: " . v::kj($je));
        $this->je = $je;
    }
    public function qp($kd)
    {
        if ($this->qj === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setListener() method");
        }
        $this->qk = $kd;
    }
    public function qq($bv, $bw)
    {
        if ($bw < 0 || $bw > 4) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setLogListener() - invalid second argument; expected a MigratoryDataLogLevel");
        }
        if ($this->qj === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "Error: setLogListener() - already connected; use this method before connect()");
        }
        $this->az->bx($bv, $bw);
    }
    public function n8()
    {
        if ($this->qj === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "connect() method");
        }
        if (!isset($this->aw)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setLoop().");
        }
        if (!isset($this->qk)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setListener()");
        }
        if (!isset($this->je)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setServers().");
        }
        $this->qj = true;
        $mk = new ja($this->je, $this->n5->b9());
        $this->au = new mj($this->n5, $mk, $this->aw, $this->qk, $this->az);
        $this->au->n8();
        $k7 = $this->n5->po();
        $qr = array_keys($k7);
        foreach ($qr as $dl) {
            $this->au->nm(array($dl), $k7[$dl]);
            $this->az->br(by::cc . $dl);
        }
    }
    public function nk()
    {
        $this->az->be("Disconnect from push server and release all resources.");
        if ($this->qj === true) {
            $this->qj = false;
            $this->az->br(by::c9);
            $this->au->nw();
        }
    }
    public function nm($k7, $cl)
    {
        $this->ql($k7, "subscribe()");
        if (!isset($k7) || count($k7) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid first argument; expected a array of strings with size > 0");
        }
        foreach ($k7 as $j) {
            if (is_null($j) || strlen($j) == 0 || !v::k5($j)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid argument; expected a valid topic with a non-empty value");
            }    
        }
        if ($cl < 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid second argument; a int with value >= 0");
        }
        $this->az->be("Subscribing to: " . v::kj($k7));
        $this->n5->pn($k7, $cl);
        if ($this->qj) {
            $this->az->br(by::cc . v::kj($k7));
            $this->au->nm($k7, $cl);
        }
    }
    public function nq($k7)
    {
        $this->ql($k7, "subscribe()");
        if (!isset($k7) || count($k7) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: unsubscribe() - invalid argument; expected a array of strings with size > 0");
        }
        foreach ($k7 as $j) {
            if (is_null($j) || strlen($j) == 0 || !v::k5($j)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid argument; expected a valid topic with a non-empty value");
            }    
        }
        $this->az->be("Unsubscribing from: " . v::kj($k7));
        $this->n5->kq($k7);
        if ($this->qj) {
            $this->az->br(by::cd . v::kj($k7));
            $this->au->nq($k7);
        }
    }
    public function nx($bq)
    {
        if ($this->qj === false) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_CONNECTED, "publish() method");
        }
        $j = $bq->getSubject();
        $k = $bq->getContent();
        if (is_null($j) || strlen($j) == 0 || !v::k5($j)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: publish() - invalid argument; expected a valid message with a non-empty topic");
        }
        if (is_null($k) || strlen($k) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: publish() - invalid argument; expected a valid message with a non-empty content");
        }
        $this->az->br(by::ce . $bq);
        $this->au->nx($bq);
    }
    public function o2()
    {
        if (!$this->qj) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "pause() method");
        }
        $this->az->be("Migratorydata client calls pause");
        $this->az->br(by::ca);
        $this->au->o2();
    }
    public function o4()
    {
        if (!$this->qj) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "resume() method");
        }
        $this->az->be("Migratorydata client calls resume");
        $this->az->br(by::cb);
        $this->au->o4();
    }
    public function po()
    {
        return array_keys($this->n5->po());
    }
    public function qs($d8)
    {
        if ($d8 !== MigratoryDataClient::TRANSPORT_HTTP && $d8 !== MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Argument for set_transport must be MigratoryDataClient::TRANSPORT_WEBSOCKET or MigratoryDataClient::TRANSPORT_HTTP");
        }
        if ($this->qj === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setTransport() method");
        }
        $this->n5->pr($d8);
        $this->az->be("Configuring transport type to: " . $d8);
    }
    public function pp($i)
    {
        if ($this->qj === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setEncryption() method");
        }
        $this->n5->pp($i);
        $this->az->be("Configuring encryption to: " . v::w($i));
    }
    public function ps($dp)
    {
        if ($this->qj === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setQuickReconnectMaxRetries() method");
        }
        if ($dp < 2) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setQuickReconnectMaxRetries() - invalid argument; expected an integer higher or equal to 2");
        }
        $this->au->ps($dp);
        $this->az->be("Configuring quickreconnect max retries to: " . $dp);
    }
    public function pv($qt)
    {
        if ($this->qj === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectPolicy() method");
        }
        if (!isset($qt) || ($qt !== MigratoryDataClient::CONSTANT_WINDOWS_BACKOFF && $qt !== MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectPolicy() - invalid argument; expected MigratoryDataClient.CONSTANT_WINDOW_BACKOFF or MigratoryDataClient.TRUNCATED_EXPONENTIAL_BACKOFF");
        }
        $this->n5->pv($qt);
        $this->az->be("Configuring reconnect policy to: " . $qt);
    }
    public function px($qu)
    {
        if ($this->qj === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectTimeInterval() method");
        }
        if ($qu < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectTimeInterval() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->n5->px($qu);
        $this->az->be("Configuring setReconnectTime interval to: " . $qu);
    }
    public function qv($i3)
    {
        if ($this->qj === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "notifyAfterFailedConnectionAttempts() method");
        }
        if ($i3 < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: notifyAfterFailedConnectionAttempts() - invalid argument; expected a positive integer");
        }
        $this->n5->q0($i3);
        $this->az->be("Configuring the number of failed connection attempts before sending a notification: " . $i3);
    }
    public function q2($qw)
    {
        if ($this->qj === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectMaxDelay() method");
        }
        if ($qw < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectMaxDelay() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->n5->q2($qw);
        $this->az->be("Configuring setReconnectMax delay to: " . $qw);
    }
    public function pz($qu)
    {
        if ($this->qj === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setQuickReconnectInitialDelay() method");
        }
        if ($qu < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setQuickReconnectInitialDelay() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->n5->pz($qu);
        $this->az->be("Configuring quickReconnectInitial delay to: " . $qu);
    }
    public function qx()
    {
        return $this->qk;
    }
    public function qy($pm)
    {
        if ($this->qj === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setConnectionTimeout() method");
        }
        $this->n5->q3($pm);
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
    private $qz = null;
    public function __construct()
    {
        $this->qz = new qh();
    }
    public function setLoop(\React\EventLoop\LoopInterface $aw)
    {
        $this->qz->qn($aw);
    }
    public function setListener(MigratoryDataListener $kd)
    {
        $this->qz->qp($kd);
    }
    public function setLogListener(MigratoryDataLogListener $bv, int $bw)
    {
        $this->qz->qq($bv, $bw);
    }
    public function setEntitlementToken(string $pl)
    {
        $this->qz->pq($pl);
    }
    public function setServers(array $je)
    {
        $this->qz->qo($je);
    }
    public function connect()
    {
        $this->qz->n8();
    }
    public function disconnect()
    {
        $this->qz->nk();
    }
    public function subscribe(array $k7)
    {
        $this->qz->nm($k7, 0);
    }
    public function subscribeWithHistory(array $k7, int $r0)
    {
        $this->qz->nm($k7, $r0);
    }
    public function unsubscribe(array $k7)
    {
        $this->qz->nq($k7);
    }
    public function publish(MigratoryDataMessage $bq)
    {
        $this->qz->nx($bq);
    }
    public function pause()
    {
        $this->qz->o2();
    }
    public function resume()
    {
        $this->qz->o4();
    }
    public function setTransport(string $d8)
    {
        $this->qz->qs($d8);
    }
    public function setEncryption(bool $i)
    {
        $this->qz->pp($i);
    }
    public function getSubjects()
    {
        return $this->qz->po();
    }
    public function getListener()
    {
        return $this->qz->qx();
    }
    public function setQuickReconnectMaxRetries(int $qa)
    {
        $this->qz->ps($qa);
    }
    public function setReconnectPolicy(string $qt)
    {
        $this->qz->pv($qt);
    }
    public function setReconnectTimeInterval(int $r1)
    {
        $this->qz->px($r1);
    }
    public function notifyAfterFailedConnectionAttempts(int $qa)
    {
        $this->qz->qv($qa);
    }
    public function setReconnectMaxDelay(int $r1)
    {
        $this->qz->q2($r1);
    }
    public function setQuickReconnectInitialDelay(int $r1)
    {
        $this->qz->pz($r1);
    }
    public function setConnectionTimeout(int $pm)
    {
        $this->qz->qy($pm);
    }
}
