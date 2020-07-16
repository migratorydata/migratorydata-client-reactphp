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
    public static $dr = array();
    public static $ds = array();
    public static $dt = array();
    public static $du = array();
    public static $dv = array();
    public static $df = array();
    public static $dw = array();
    const dx = 0x19;
    const dy = 0x7F;
    const dz = 0x1E;
    const e0 = 0x1F;
    public static function e1()
    {
        self::$dr = array_fill(0, 128, -1);
        self::$dr[e2::e3] = 0x01;
        self::$dr[e2::e4] = 0x02;
        self::$dr[e2::e5] = 0x03;
        self::$dr[e2::e6] = 0x04;
        self::$dr[e2::e7] = 0x05;
        self::$dr[e2::e8] = 0x06;
        self::$dr[e2::e9] = 0x07;
        self::$dr[e2::ea] = 0x08;
        self::$dr[e2::eb] = 0x09;
        self::$dr[e2::ec] = 0x0B;
        self::$dr[e2::ed] = 0x0C;
        self::$dr[e2::ee] = 0x0E;
        self::$dr[e2::ef] = 0x0F;
        self::$dr[e2::eg] = 0x10;
        self::$dr[e2::eh] = 0x11;
        self::$dr[e2::ei] = 0x12;
        self::$dr[e2::c6] = 0x13;
        self::$dr[e2::ej] = 0x14;
        self::$dr[e2::ek] = 0x1A;
        self::$ds = array_fill(0, 128, -1);
        self::$ds[el::em] = 0x01;
        self::$ds[el::en] = 0x02;
        self::$ds[el::eo] = 0x03;
        self::$ds[el::ep] = 0x04;
        self::$ds[el::eq] = 0x05;
        self::$ds[el::er] = 0x06;
        self::$ds[el::es] = 0x07;
        self::$ds[el::et] = 0x08;
        self::$ds[el::eu] = 0x09;
        self::$ds[el::ev] = 0x0B;
        self::$ds[el::ew] = 0x0C;
        self::$ds[el::ex] = 0x0F;
        self::$ds[el::ey] = 0x12;
        self::$ds[el::ez] = 0x13;
        self::$ds[el::f0] = 0x14;
        self::$ds[el::f1] = 0x15;
        self::$ds[el::f2] = 0x16;
        self::$ds[el::f3] = 0x17;
        self::$ds[el::f4] = 0x18;
        self::$ds[el::f5] = 0x1A;
        self::$ds[el::f6] = 0x27;
        self::$ds[el::f7] = 0x23;
        self::$ds[el::f8] = 0x24;
        self::$ds[el::f9] = 0x25;
        self::$ds[el::fa] = 0x10;
        self::$ds[el::fb] = 0x11;
        self::$ds[el::fc] = 0x28;
        self::$ds[el::fd] = 0x2C;
        self::$ds[el::fe] = 0x2D;
        self::$ds[el::ff] = 0x30;
        self::$ds[el::fg] = 0x1D;
        self::$ds[el::fh] = 0x26;
        self::$dv = array_fill(0, 128, -1);
        self::fi(el::em, fj::fk);
        self::fi(el::en, fj::fl);
        self::fi(el::eo, fj::fm);
        self::fi(el::ep, fj::fm);
        self::fi(el::eq, fj::fm);
        self::fi(el::er, fj::fm);
        self::fi(el::es, fj::fl);
        self::fi(el::et, fj::fl);
        self::fi(el::eu, fj::fl);
        self::fi(el::ev, fj::fm);
        self::fi(el::ew, fj::fl);
        self::fi(el::ex, fj::fm);
        self::fi(el::ey, fj::fk);
        self::fi(el::ez, fj::fk);
        self::fi(el::f0, fj::fk);
        self::fi(el::f1, fj::fm);
        self::fi(el::f2, fj::fm);
        self::fi(el::f3, fj::fm);
        self::fi(el::f4, fj::fm);
        self::fi(el::f5, fj::fk);
        self::fi(el::f6, fj::fk);
        self::fi(el::f7, fj::fk);
        self::fi(el::f8, fj::fm);
        self::fi(el::f9, fj::fm);
        self::fi(el::fa, fj::fk);
        self::fi(el::fb, fj::fm);
        self::fi(el::fc, fj::fm);
        self::fi(el::fd, fj::fk);
        self::fi(el::fe, fj::fm);
        self::fi(el::ff, fj::fk);
        self::fi(el::fg, fj::fm);
        self::fi(el::fh, fj::fm);
        self::$du = array_fill(0, 255, -1);
        self::$du[self::dy] = 0x01;
        self::$du[self::dz] = 0x02;
        self::$du[self::e0] = 0x03;
        self::$du[fn::fo] = 0x04;
        self::$du[fn::fp] = 0x05;
        self::$du[fn::fq] = 0x06;
        self::$du[fn::fr] = 0x07;
        self::$du[fn::fs] = 0x08;
        self::$du[33] = 0x09;
        self::$du[self::dx] = 0x0B;
        self::$dt = array_fill(0, 255, -1);
        for ($i = 0; $i <= 128; $i++) {
            $e = self::ft($i);
            if ($e != -1) {
                self::$dt[$e] = $i;
            }
        }
        self::$df = array_fill(0, 128, -1);
        for ($fu = 0; $fu <= el::fh; $fu++) {
            self::$df[self::fv($fu)] = $fu;
        }
        self::$dw = array_fill(0, 128, -1);
        for ($fu = 0; $fu <= e2::ek; $fu++) {
            self::$dw[self::fw($fu)] = $fu;
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
                $g1[$g2] = self::e0;
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
            if ($fy[$fu] == self::e0) {
                $fz++;
            }
        }
        $g1 = array_fill(0, count($fy) - $fz, 0);
        for ($fu = 0, $g2 = 0; $fu < count($fy); $fu++, $g2++) {
            $g4 = $fy[$fu];
            if ($g4 == self::e0) {
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
        $gb = strpos($y, chr(self::dz), $ga);
        if ($ga !== false && $gb !== false) {
            $gc = substr($y, $ga + 1, $gb - ($ga + 1));
            switch ($g8) {
                case fj::gd:
                    $g9 = $gc;
                    break;
                case fj::fl:
                    $g9 = $gc;
                    break;
                case fj::fk:
                    $g9 = $gc;
                    break;
                case fj::fm:
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
        } else if ($gj == 2 && $y[$ab] == self::e0) {
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
            if ($g4 == self::e0) {
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
                return pack('C*', self::e0, $i);
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
                $g1[$gm] = self::e0;
                $g1[$gm + 1] = $g0;
                $gm++;
            }
            $gm++;
            $g1[$gm] |= ($b << (7 - $gn)) & 0x7F;
            $gl -= 8;
        }
        $g0 = self::ft($g1[$gm]);
        if ($g0 != -1) {
            $g1[$gm] = self::e0;
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
        return $b >= 0 ? self::$dt[$b] : -1;
    }
    public static function ft($b)
    {
        return $b >= 0 ? self::$du[$b] : -1;
    }
    public static function fv($h)
    {
        return self::$ds[$h];
    }
    public static function go($g4)
    {
        return self::$df[$g4];
    }
    public static function fw($o)
    {
        return self::$dr[$o];
    }
    public static function dg($g4)
    {
        return self::$dw[$g4];
    }
    public static function gp()
    {
        return self::dx;
    }
    public static function fi($gq, $gr)
    {
        self::$dv[dq::fv($gq)] = $gr;
    }
    public static function gs($gq)
    {
        $gt = self::fv($gq);
        return self::$dv[$gt];
    }
}
class e2
{
    const e3 = 0;
    const e4 = 1;
    const e5 = 2;
    const e6 = 3;
    const e7 = 4;
    const e8 = 5;
    const e9 = 6;
    const ea = 7;
    const ei = 8;
    const eb = 9;
    const ec = 10;
    const ed = 11;
    const ee = 12;
    const ef = 13;
    const eh = 14;
    const eg = 15;
    const c6 = 16;
    const ej = 17;
    const ek = 18;
}
class el
{
    const em = 0;
    const en = 1;
    const eo = 2;
    const ep = 3;
    const eq = 4;
    const er = 5;
    const es = 6;
    const et = 7;
    const eu = 8;
    const ev = 9;
    const ew = 10;
    const ex = 11;
    const ey = 12;
    const ez = 13;
    const f0 = 14;
    const f1 = 15;
    const f2 = 16;
    const f3 = 17;
    const f4 = 18;
    const f5 = 19;
    const f6 = 20;
    const f7 = 21;
    const f8 = 22;
    const f9 = 23;
    const fa = 24;
    const fb = 25;
    const fc = 26;
    const fd = 27;
    const fe = 28;
    const ff = 29;
    const fg = 30;
    const fh = 31;
}
class fj
{
    const gd = 0;
    const fl = 1;
    const fk = 2;
    const fm = 3;
}
class gu
{
    const gv = "1";
    const gw = "2";
    const gx = "3";
    const gy = "4";
}
class fn
{
    const fo = 0x00;
    const fr = 0x22;
    const fp = 0x0A;
    const fq = 0x0D;
    const fs = 0x5C;
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
dq::e1();
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
		$g->a6(dq::fx($e));
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
    private $eq = gz::h1;
    private $i5 = MigratoryDataClient::TRANSPORT_WEBSOCKET;
    public function __construct()
    {
    }
    public function i6()
    {
        $this->i5 = MigratoryDataClient::TRANSPORT_HTTP;
        $this->eq = gz::h0;
    }
    public function i7($g, $i8, $i9, $ia, $ib)
    {
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dq::fw(e2::ek)));
        } else {
            $g->a6(chr(dq::fw(e2::ek)) ^ $g->a8());
        }
        if (strlen($i8) > 0) {
            $g->a6($this->ic(dq::fv(el::ez), dq::fx($i8), $g));
        }
        $g->a6($this->ic(dq::fv(el::f8), dq::gk($i9), $g));
        $g->a6($this->ic(dq::fv(el::f7), dq::fx($ib), $g));
        $g->a6($this->ic(dq::fv(el::fe), dq::gk($ia), $g));
        $g->a6($this->ic(dq::fv(el::eq), dq::gk($this->eq), $g));
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dq::dy));
        } else {
            $g->a6(chr(dq::dy) ^ $g->a8());
        }
    }
    public function id($g, $j, $ie)
    {
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dq::fw(e2::e3)));
        } else {
            $g->a6(chr(dq::fw(e2::e3)) ^ $g->a8());
        }
        $g->a6($this->ic(dq::fv(el::em), dq::fx($j->cz()), $g));
        if (isset($ie) && $ie >= 0) {
            $g->a6($this->ic(dq::fv(el::er), dq::gk($ie), $g));
        }
        $ig = $j->d7();
        switch ($ig) {
            case ct::cu:
                break;
            case ct::d9:
                $g->a6($this->ic(dq::fv(el::fc), dq::gk($j->d0()), $g));
                break;
            case ct::da:
                $g->a6($this->ic(dq::fv(el::ep), dq::gk($j->cx()), $g));
                $g->a6($this->ic(dq::fv(el::eo), dq::gk($j->cv() + 1), $g));
                break;
        }
        $g->a6($this->ic(dq::fv(el::eq), dq::gk($this->eq), $g));
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dq::dy));
        } else {
            $g->a6(chr(dq::dy) ^ $g->a8());
        }
    }
    public function ih($g, $ie, $j)
    {
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dq::fw(e2::e4)));
        } else {
            $g->a6(chr(dq::fw(e2::e4)) ^ $g->a8());
        }
        $g->a6($this->ic(dq::fv(el::em), dq::fx($j), $g));
        if ($ie > 0) {
            $g->a6($this->ic(dq::fv(el::er), dq::gk($ie), $g));
        }
        $g->a6($this->ic(dq::fv(el::eq), dq::gk($this->eq), $g));
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dq::dy));
        } else {
            $g->a6(chr(dq::dy) ^ $g->a8());
        }
    }
    public function ii($g, $ie)
    {
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dq::fw(e2::e4)));
        } else {
            $g->a6(chr(dq::fw(e2::e4)) ^ $g->a8());
        }
        if ($ie > 0) {
            $g->a6($this->ic(dq::fv(el::er), dq::gk($ie), $g));
        }
        $g->a6($this->ic(dq::fv(el::eq), dq::gk($this->eq), $g));
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dq::dy));
        } else {
            $g->a6(chr(dq::dy) ^ $g->a8());
        }
    }
    public function ij($g, $bq, $ik)
    {
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dq::fw(e2::eg)));
        } else {
            $g->a6(chr(dq::fw(e2::eg)) ^ $g->a8());
        }
        $g->a6($this->ic(dq::fv(el::em), dq::fx($bq->getSubject()), $g));
        if ($bq->isCompressed()) {
            $il = $this->im($bq->getContent());
            if (strlen($il) < strlen($bq->getContent())) {
                $g->a6($this->ic(dq::fv(el::en), dq::fx($il), $g));
            } else {
                $g->a6($this->ic(dq::fv(el::en), dq::fx($bq->getContent()), $g));
                $bq->setCompressed(false);
            }
        } else {
            $g->a6($this->ic(dq::fv(el::en), dq::fx($bq->getContent()), $g));
        }
        $m = $bq->getReplySubject();
        if (strlen($m) > 0) {
            $g->a6($this->ic(dq::fv(el::fd), dq::fx($m), $g));
        }
        $l = $bq->getClosure();
        if (strlen($l) > 0) {
            $g->a6($this->ic(dq::fv(el::fa), dq::fx($l), $g));
        }
        $g->a6($this->ic(dq::fv(el::er), dq::gk($ik), $g));
        if ($bq->getQos() == QoS::GUARANTEED) {
            $g->a6($this->ic(dq::fv(el::f4), dq::gk(QoS::GUARANTEED), $g));
        } else {
            $g->a6($this->ic(dq::fv(el::f4), dq::gk(QoS::STANDARD), $g));
        }
        if ($bq->isRetained() == true) {
            $g->a6($this->ic(dq::fv(el::f3), dq::gk(1), $g));
        } else {
            $g->a6($this->ic(dq::fv(el::f3), dq::gk(0), $g));
        }
        if ($bq->isCompressed()) {
            $g->a6($this->ic(dq::fv(el::fh), dq::gk(1), $g));
        }
        $g->a6($this->ic(dq::fv(el::eq), dq::gk($this->eq), $g));
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g->a6(chr(dq::dy));
        } else {
            $g->a6(chr(dq::dy) ^ $g->a8());
        }
    }
    private function ic($g9, $y, $g)
    {
        $g1 = '';
        if ($this->i5 == MigratoryDataClient::TRANSPORT_HTTP) {
            $g1 .= chr($g9);
            $g1 .= $y;
            $g1 .= chr(dq::dz);
        } else {
            $g1 .= chr($g9) ^ $g->a8();
            for ($fu = 0; $fu < strlen($y); $fu++) {
                $g1 .= $y[$fu] ^ $g->a8();
            }
            $g1 .= chr(dq::dz) ^ $g->a8();
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
    const k3 = '/^\/([^\/*]+\/)*([^\/*])+$/';
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
    public static function ki($kj)
    {
        $kk = "";
        if (count($kj) > 0) {
            $kk .= "[";
            for ($fu = 0; $fu < count($kj); $fu++) {
                $kk .= $kj[$fu];
                if ($fu + 1 != count($kj)) {
                    $kk .= ", ";
                }
            }
            $kk .= "]";
        }
        return $kk;
    }
    public static function w($kl)
    {
        if ($kl) {
            return "true";
        }
        return "false";
    }
}
class km
{
    private $kn = array();
    public function ko($k7, $cl)
    {
        foreach ($k7 as $j) {
            if (!array_key_exists($j, $this->kn)) {
                $ka = new cj($j, $cl);
                $this->kn[$j] = $ka;
            }
        }
    }
    public function kp($k7)
    {
        $kq = array();
        foreach ($k7 as $j) {
            if (array_key_exists($j, $this->kn)) {
                unset($this->kn[$j]);
                array_push($kq, $j);
            }
        }
        return $kq;
    }
    public function kr()
    {
        return array_keys($this->kn);
    }
    public function cz($j)
    {
        if (array_key_exists($j, $this->kn)) {
            return $this->kn[$j];
        }
        return null;
    }
    public function ks($j)
    {
        return array_key_exists($j, $this->kn);
    }
    public function kt()
    {
        $ku = array_values($this->kn);
        foreach ($ku as $kv) {
            $kv->dc();
        }
    }
}
class kw
{
    private $kx;
    private $ky;
    public function __construct($kx, $ky)
    {
        $this->kx = $kx;
        $this->ky = $ky;
    }
    public function kz()
    {
        return $this->kx;
    }
    public function l0()
    {
        return $this->ky;
    }
}
class l1
{
    public static function l2($g)
    {
        $l3 = l1::l4($g, 0);
        $ab = $l3->kz();
        if ($g->ap() < $l3->l0()) {
            $ab = -1;
        }
        if ($ab === -1) {
            return $ab;
        }
        while (ord($g->ad($ab)) === dq::dy) {
            $ab++;
        }
        return $ab;
    }
    public static function l4($g, $a3)
    {
        $l5 = new kw(-1, -1);
        if ($a3 == $g->ap()) {
            return $l5;
        }
        $ab = $a3;
        $l6 = 2;
        $l7 = 0;
        $l8 = 0;
        $l9 = $g->ap() - $ab;
        if ($l9 < $l6) {
            return $l5;
        }
        $g4 = dq::ge($g->ad($ab));
        $hr = ($g4 >> 7) & 0x01;
        $la = $g4 & 0x40;
        $lb = $g4 & 0x20;
        $lc = $g4 & 0x10;
        if ($hr !== 1 || $la != 0 || $lb != 0 || $lc != 0) {
            return $l5;
        }
        $ab++;
        $g4 = dq::ge($g->ad($ab));
        $ld = $g4 & 0x7F;
        if ($ld < 126) {
            $l8 = 0;
            $l7 = $ld;
        } else if ($ld === 126) {
            $l8 = 2;
            if ($l9 < $l6 + $l8) {
                return $l5;
            }
            $le = "";
            for ($fu = $ab + 1; $fu <= $ab + $l8; $fu++) {
                $le .= $g->ad($fu);
            }
            $l7 = l1::lf($le);
            $ab += $l8;
        } else {
            $l8 = 8;
            if ($l9 < $l6 + $l8) {
                return $l5;
            }
            $le = "";
            for ($fu = $ab + 1; $fu <= $ab + $l8; $fu++) {
                $le .= $g->ad($fu);
            }
            $l7 = l1::lf($le);
            $ab += $l8;
        }
        if ($l9 < ($l6 + $l8 + $l7)) {
            return $l5;
        }
        $ab += 1;
        return new kw($ab, $ab + $l7);
    }
    private static function lf($y)
    {
        if (strlen($y) === 2) {
            return (ord($y[0] & chr(0xFF)) << 8) | ord($y[1] & chr(0xFF));
        } else {
            $lg = ord($y[4] & chr(0x7F)) << 24;
            $lh = ord($y[5] & chr(0xFF)) << 16;
            $li = ord($y[6] & chr(0xFF)) << 8;
            $lj = ord($y[7] & chr(0xFF));
            $lk = $lg | $lh | $li | $lj;
            return $lk;
        }
    }
}
class ll
{
    public static function lm($g)
    {
        $ln = $g->a9();
        if ($g->ad($ln) == "H") {
            $ln = self::lo($g);
        }
        if ($ln == -1) {
            return array();
        }
        $g->a3($ln);
        $lp = array();
        while (true) {
            if ($ln >= $g->ap()) {
                return $lp;
            }
            if (dq::ge($g->ad($ln)) == dq::gp()) {
                $ln++;
            } else {
                $l3 = l1::l4($g, $ln);
                $lq = $l3->kz();
                $lr = $l3->l0();
                if ($lq == -1) {
                    return $lp;
                }
                while (true) {
                    $fu = self::ls($g, $lq, $lr, chr(dq::dy));
                    if ($fu == -1) {
                        break;
                    }
                    $df = self::lt($g, $lq + 1, $fu);
                    if ($df != null) {
                        $lu = new dd(dq::dg(ord($g->ad($lq))), $df);
                        array_push($lp, $lu);
                    }
                    $lq = $fu + 1;
                    $g->a3($lq);
                }
                $ln = $g->a9();
            }
        }
    }
    public static function lv($g)
    {
        $ln = ll::lw($g);
        if ($ln == -1) {
            return array();
        }
        $g->a3($ln);
        $lp = array();
        $ab = $g->a9();
        while (true) {
            $fu = self::ls($g, $ab, $g->ap(), chr(dq::dy));
            if ($fu == -1) {
                break;
            }
            $lx = $g->ad($ab);
            if ($lx == "H") {
                $ly = ll::lv($g);
                foreach ($ly as $lz) {
                    array_push($lp, $lz);
                }
                break;
            }
            $df = ll::lt($g, $ab + 1, $fu);
            $lu = new dd(dq::dg(ord($g->ad($ab))), $df);
            array_push($lp, $lu);
            $ab = $fu + 1;
            $g->a3($ab);
        }
        return $lp;
    }
    public static function lt($g, $kx, $ky)
    {
        $df = null;
        while (true) {
            if ($kx >= $ky) {
                break;
            }
            $gq = ord($g->ad($kx));
            $m0 = self::ls($g, $kx + 1, $ky, chr(dq::dz));
            if ($m0 == -1) {
                return null;
            }
            $g9 = dq::go($gq);
            if ($g9 === null) {
                $kx = $m0 + 1;
                continue;
            }
            $kx++;
            if ($df == null) {
                $df = array();
            }
            $ac = null;
            $m1 = substr($g->an(), $kx, $m0 - $kx);
            switch (dq::gs($g9)) {
                case fj::fm:
                    $ac = dq::ge($m1);
                    break;
                case fj::fk:
                    $ac = dq::g3($m1);
                    break;
                case fj::fl:
                    $ac = dq::g3($m1);
                    break;
                case fj::gd:
                    $ac = $m1;
                    break;
            }
            if (!array_key_exists($g9, $df)) {
                $df[$g9] = $ac;
            } else {
                $m2 = $df[$g9];
                if (is_array($m2)) {
                    array_push($m2, $ac);
                } else {
                    $m3 = array();
                    array_push($m3, $m2);
                    array_push($m3, $ac);
                    $df[$g9] = $m3;
                }
            }
            $kx = $m0 + 1;
        }
        return $df;
    }
    public static function lw($g)
    {
        $m4 = $g->a9();
        $y = $g->ao();
        $m5 = dq::fx(v::h8);
        $ab = ll::m6($m5, $y);
        if ($ab == -1) {
            return -1;
        }
        $ab += strlen($m5);
        $m7 = "\r";
        $m8 = ll::ls($g, $ab, $g->ap(), $m7);
        if ($m8 == -1) {
            return -1;
        }
        $m9 = substr($y, $ab, $m8 - $ab);
        $ma = intval($m9);
        $ab = ll::m6(v::k4, $y);
        if ($ab == -1) {
            return $ab;
        }
        $ab += strlen(v::k4);
        if (($ab + $ma) > strlen($y)) {
            return -1;
        }
        return $m4 + $ab;
    }
    private static function ls($g, $kx, $ky, $mb)
    {
        for ($fu = $kx; $fu < $ky; $fu++) {
            $x = $g->ad($fu);
            if ($g->ad($fu) == $mb) {
                return $fu;
            }
        }
        return -1;
    }
    private static function m6($mc, $md)
    {
        $lz = strlen($mc);
        $i3 = strlen($md);
        $me = array_fill(0, $lz, 0);
        ll::mf($mc, $lz, $me);
        $fu = 0;
        $g2 = 0;
        while ($fu < $i3) {
            if ($mc[$g2] == $md[$fu]) {
                $g2++;
                $fu++;
            }
            if ($g2 == $lz) {
                return $fu - $g2;
            } else if ($fu < $i3 && $mc[$g2] != $md[$fu]) {
                if ($g2 != 0)
                    $g2 = $me[$g2 - 1];
                else
                    $fu = $fu + 1;
            }
        }
        return -1;
    }
    private static function mf($mc, $lz, &$me)
    {
        $gj = 0;
        $me[0] = 0;
        $fu = 1;
        while ($fu < $lz) {
            if ($mc[$fu] == $mc[$gj]) {
                $gj++;
                $me[$fu] = $gj;
                $fu++;
            } else {
                if ($gj != 0) {
                    $gj = $me[$gj - 1];
                } else {
                    $me[$fu] = 0;
                    $fu++;
                }
            }
        }
    }
    private static function lo($g)
    {
        $mg = "\r\n\r\n";
        $ab = $g->a9();
        $fu = self::m6($mg, $g->ao());
        if ($fu == -1) {
            return -1;
        }
        $ab = $fu + strlen($mg);
        return $ab;
    }
}
class mh
{
    private $b0 = null;
    private $e = null;
    private $mi = null;
    private $aw = null;
    private $kd = null;
    private $mj = false;
    private $mk = false;
    private $ax = null;
    private $ml = mm::mn;
    private $mo = null;
    private $mp = null;
    private $mq = null;
    private $ie = -1;
    private $mr = false;
    private $ms = 0;
    private $mt = false;
    private $mu = 0;
    private $mv = false;
    private $mw = null;
    private $mx = null;
    private $my = array();
    private $mz = null;
    private $n0;
    private $az = null;
    public function __construct($n1, $mi, $aw, $kd, $az)
    {
        $this->b0 = $n1;
        $this->mi = $mi;
        $this->aw = $aw;
        $this->kd = $kd;
        $this->az = $az;
        $this->ax = new n2($this->b0, $this);
        $this->n0 = new km();
        $this->mp = new i4();
        if ($n1->n3() === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            $this->mo = new hd();
        } else {
            $this->mo = new h5();
            $this->mp->i6();
        }
    }
    public function n4()
    {
        $this->mz = uniqid();
        $n5 = $this->mi->jg();
        $this->az->be("Connecting to the cluster member: " . $n5);
        $this->mq = new at($this, $n5->j4(), $n5->j5(), $this->ax, $this->mz, $this->az);
        $this->mq->b5();
    }
    public function ba()
    {
        if ($this->b0->n3() !== MigratoryDataClient::TRANSPORT_HTTP) {
            $g = $this->mo->h($this->mi->bg()->j4(), $this->b0->b9());
            $this->mq->bj($g->ao());
        }
        $this->ax->n6($this->mz, n7::ek);
        $this->ax->n8();
        $this->n9();
    }
    public function n9()
    {
        $g = $this->mo->d($this->mi->bg()->j4());
        $this->mp->i7($g, $this->b0->na(), $this->b0->nb(), $this->b0->nc(), $this->b0->nd());
        $this->mo->f($g);
        $this->mq->bj($g->ao());
    }
    public function bc($ay, $ne, $nf)
    {
        if ($ay === $this->mz) {
            $this->mj = false;
            $this->az->br(by::c3 . $this->mz . " " . $nf);
            $this->ng();
            $this->nh();
            $this->ax->bc($this->mz, v::bd);
        }
    }
    public function ni($k7, $cl)
    {
        if (!isset($k7) || count($k7) == 0) {
            return;
        }
        $k7 = v::k6($k7);
        $nj = array_diff($k7, $this->n0->kr());
        if (count($nj) == 0) {
            return 0;
        }
        $this->n0->ko($nj, $cl);
        if ($this->mj) {
            $this->nk($nj);
        }
    }
    private function nk($k7)
    {
        $g = $this->mo->d($this->mi->bg()->j4());
        foreach ($k7 as $j) {
            $this->nl($g, $this->n0->cz($j));
        }
        $this->mo->f($g);
        $this->mq->bj($g->ao());
    }
    private function nl($g, $j)
    {
        $this->mp->id($g, $j, $this->ie);
    }
    public function nm($k7)
    {
        if (!isset($k7) || count($k7) == 0) {
            return;
        }
        $nn = array_intersect($k7, $this->n0->kr());
        if (count($nn) == 0) {
            return;
        }
        $kq = $this->n0->kp($nn);
        if ($this->mj) {
            $this->no($kq);
        }
    }
    private function no($k7)
    {
        $g = $this->mo->d($this->mi->bg()->j4());
        foreach ($k7 as $j) {
            $this->mp->ih($g, $this->ie, $j);
        }
        $this->mo->f($g);
        $this->mq->bj($g->ao());
    }
    public function np()
    {
        $this->ng();
        if ($this->ml == mm::nq) {
            return;
        }
        $this->mi->jl($this->mi->bg());
        $this->mk = true;
        $this->n4();
    }
    public function ng()
    {
        $this->ax->nr();
        $this->dc();
        if (isset($this->mq)) {
            $this->mq->bk();
        }
        $this->mq = null;
    }
    private function dc()
    {
        $this->mj = false;
        $this->ie = -1;
        $this->mt = false;
    }
    public function ns()
    {
        $this->ml = mm::nq;
        $this->ng();
    }
    public function nt($bq)
    {
        if (!$this->mj) {
            $this->nu(MigratoryDataClient::NOTIFY_PUBLISH_FAILED, $bq);
            return;
        }
        $this->nv($bq);
    }
    public function nv($bq)
    {
        $m = $bq->getReplySubject();
        if (strlen($m) > 0 && v::k5($m) && !$this->n0->ks($m)) {
            $this->ni(array($m), 0);
        }
        $g = $this->mo->d($this->mi->bg()->j4());
        $this->mp->ij($g, $bq, $this->ie);
        $this->mo->f($g);
        if (isset($this->mx) && ($g->ap() - $g->a9()) > $this->mx) {
            $this->nu(MigratoryDataClient::NOTIFY_MESSAGE_SIZE_LIMIT_EXCEEDED, $bq);
            return;
        }
        $l = $bq->getClosure();
        if (isset($l) && strlen($l) > 0) {
            array_push($this->my, $l);
        }
        $this->mq->bj($g->ao());
    }
    public function nh()
    {
        foreach ($this->my as $l) {
            $this->az->br(by::c7 . $l);
            $this->kd->onStatus(MigratoryDataClient::NOTIFY_PUBLISH_FAILED, $l);
        }
        $this->my = array();
    }
    public function nw()
    {
        $g = $this->mo->d($this->mi->bg()->j4());
        $this->mp->ii($g, $this->ie);
        $this->mo->f($g);
        $this->mq->bj($g->ao());
    }
    public function nu($nx, $bq)
    {
        if (isset($bq) && strlen($bq->getClosure()) > 0) {
            $this->kd->onStatus($nx, $bq->getClosure());
        }
    }
    public function ny()
    {
        if ($this->ml != mm::mn) {
            return;
        }
        $this->az->be("Call pause");
        $this->ml = mm::nz;
        $this->ng();
    }
    public function o0()
    {
        if ($this->ml != mm::nz) {
            return;
        }
        $this->az->be("Call resume");
        $this->ml = mm::mn;
        $this->o1();
        $this->np();
    }
    public function b3()
    {
        return $this->aw;
    }
    public function o2()
    {
        return $this->az;
    }
    public function bf()
    {
        return $this->mi;
    }
    public function bh()
    {
        return $this->mz;
    }
    public function o3($o4)
    {
        $this->mz = $o4;
    }
    public function o5()
    {
        return $this->mj;
    }
    public function o6()
    {
        return $this->mu;
    }
    public function o7()
    {
        $this->mu++;
        return $this->mu;
    }
    public function o8($mj)
    {
        $this->mj = $mj;
    }
    public function o9()
    {
        return $this->ml;
    }
    public function b4()
    {
        return $this->b0;
    }
    public function bb($g)
    {
        if ($this->b0->n3() === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            $lp = ll::lm($g);
        } else {
            $lp = ll::lv($g);
        }
        if (count($lp) > 0) {
            $this->oa($lp);
        } else {
            $this->az->br(by::c0);
            $this->ax->n6($this->mz, n7::ob);
        }
    }
    private function oa($lp)
    {
        foreach ($lp as $bq) {
            switch ($bq->dg()) {
                case e2::e5:
                case e2::eb:
                case e2::c6:
                case e2::ea:
                case e2::ek:
                case e2::e3:
                case e2::e4:
                    $this->az->br(by::bz . " " . $bq);
                    $this->oc($bq);
                    break;
                case e2::e6:
                    $this->az->br(by::c0);
                    $this->ax->n6($this->mz, n7::ob);
                    break;
                case e2::eg:
                    break;
                default:
                    $this->az->bs("No existing opeartion for message: " . $bq);
            }
        }
    }
    private function oc($bq)
    {
        $this->ax->n6($this->mz, n7::ob);
        $df = $bq->dh();
        switch ($bq->dg()) {
            case e2::e5:
                $this->od($df);
                break;
            case e2::e3:
                $this->oe($df);
                break;
            case e2::ek:
                $this->of($df);
                break;
            case e2::e4:
                $this->og($df);
                break;
            case e2::eb:
                $this->oh($df);
                break;
            case e2::c6:
                $this->oi($df);
                break;
            case e2::ea:
                $this->oj($df);
                break;
            default:
                $this->az->bs("No existing opeartion for message: " . $bq);
        }
    }
    private function od($df)
    {
        if (array_key_exists(el::em, $df)) {
            $j = $df[el::em];
            $ka = $this->n0->cz($j);
            if (!isset($ka)) {
                return;
            }
        }
        if (array_key_exists(el::ff, $df)) {
            $ok = $df[el::ff];
            $this->ol($ok);
        }
        if (array_key_exists(el::en, $df)) {
            $y = $df[el::en];
        }
        $o = false;
        if (array_key_exists(el::f3, $df)) {
            $om = $df[el::f3];
            if ($om === 1) {
                $o = true;
            }
        }
        $r = false;
        if (array_key_exists(el::fh, $df)) {
            $on = $df[el::fh];
            if ($on === 1) {
                $r = true;
            }
        }
        if ($r) {
            $y = $this->mp->ip($y);
        }
        $oo = MessageType::UPDATE;
        if (array_key_exists(el::f6, $df)) {
            $s = $df[el::f6];
            switch ($s) {
                case gu::gv:
                    $oo = MessageType::SNAPSHOT;
                    break;
                case gu::gx:
                    $oo = MessageType::RECOVERED;
                    break;
                case gu::gy:
                    $oo = MessageType::HISTORICAL;
                    break;
            }
        }
        $n = QoS::GUARANTEED;
        if (array_key_exists(el::f4, $df)) {
            $op = $df[el::f4];
            if ($op === QoS::STANDARD) {
                $n = QoS::STANDARD;
            }
        }
        $l = "";
        if (array_key_exists(el::fa, $df)) {
            $l = $df[el::fa];
        }
        $m = "";
        if (array_key_exists(el::fd, $df)) {
            $m = $df[el::fd];
        }
        if ($this->mv && $n == QoS::GUARANTEED) {
            $oq = new jp($j, $y, $oo, $l, $n, $o, $m, $r);
            if (array_key_exists(el::eo, $df)) {
                $p = $df[el::eo];
            }
            if (array_key_exists(el::ep, $df)) {
                $cm = $df[el::ep];
            }
            $oq->cw($p);
            $oq->jq($cm);
            $os = v::k9($ka, $p, $cm, $this->kd, $this->az);
            if ($os == ke::kf) {
                $this->az->br(by::c4 . $oq);
                $this->kd->onMessage($oq);
            } else if ($os == ke::kh) {
                $this->bc($this->mz, v::jx, "seq_higher");
            }
        } else {
            $oq = new jp($j, $y, $oo, "", $n, $o, $m, $r);
            $this->az->br(by::c4 . $oq);
            $this->kd->onMessage($oq);
        }
    }
    private function oe($df)
    {
    }
    private function of($df)
    {
        if (array_key_exists(el::er, $df)) {
            $ie = $df[el::er];
            $this->ot();
            $this->ie = $ie;
            $this->mt = true;
            $this->mu = 0;
            if (array_key_exists(el::fb, $df)) {
                $ou = $df[el::fb];
                if ($ou == 1) {
                    $this->mv = true;
                }
            }
            if (array_key_exists(el::f9, $df)) {
                $ov = $df[el::f9];
                $this->ax->ow($ov);
                $this->ax->n6($this->mz, n7::ob);
            }
            $this->mj = true;
            if (array_key_exists(el::ff, $df)) {
                $ok = $df[el::ff];
                $this->ol($ok);
            }
            if (array_key_exists(el::fg, $df)) {
                $this->mx = $df[el::fg];
            }
            $k7 = $this->n0->kr();
            if (count($k7)) {
                $this->nk($k7);
            }
        }
    }
    private function o1()
    {
        $this->mr = false;
        $this->ms = 0;
    }
    private function ot()
    {
        $this->az->be("Connected to cluster member: " . $this->mi->bg());
        $this->o1();
        $this->az->br(by::c1 . MigratoryDataClient::NOTIFY_SERVER_UP . " " . $this->mz);
        $this->kd->onStatus(MigratoryDataClient::NOTIFY_SERVER_UP, $this->mi->bg()->j6());
    }
    public function ox($oy)
    {
        $this->az->bt("[" . $oy . "] [" . $this->mi->bg() . "]");
        $this->az->be("Lost connection with the cluster member: " . $this->mi->bg());
        if (!$this->mt) {
            $this->ms++;
            if (!$this->mr) {
                if ($this->ms >= $this->b0->oz()) {
                    $this->az->br(by::c2 . $oy);
                    $this->mr = true;
                    $this->kd->onStatus(MigratoryDataClient::NOTIFY_SERVER_DOWN, $this->mi->bg()->j6());
                }
            }
        }
    }
    private function ol($ok)
    {
        if (isset($this->mw)) {
            if ($ok !== $this->mw) {
                $this->mw = $ok;
                // reset epoch and seq
                $this->n0->kt();
            }
        } else {
            $this->mw = $ok;
        }
    }
    private function og($df)
    {
    }
    private function oh($df)
    {
        if (array_key_exists(el::f0, $df)
            && array_key_exists(el::em, $df)) {
            $p0 = $df[el::f0];
            $j = $df[el::em];
            $p1 = true;
            $p2 = MigratoryDataClient::NOTIFY_SUBSCRIBE_DENY;
            if ($p0 == h2::h4) {
                $p2 = MigratoryDataClient::NOTIFY_SUBSCRIBE_ALLOW;
                $p1 = false;
            } else if ($p0 == h2::h3) {
                $p2 = MigratoryDataClient::NOTIFY_SUBSCRIBE_DENY;
            }
            if ($p1) {
                $this->n0->kp(array($j));
            }
            $this->az->br(by::c8 . $j . " " . $p0 . " " . $p2);
            $this->kd->onStatus($p2, $j);
        }
    }
    private function oi($df)
    {
        if (!isset($df)) {
            return;
        }
        if (array_key_exists(el::fa, $df)
            && array_key_exists(el::f0, $df)) {
            $l = $df[el::fa];
            $p3 = $df[el::f0];
            $d5 = MigratoryDataClient::NOTIFY_PUBLISH_FAILED;
            if ($p3 == v::jv) {
                $d5 = MigratoryDataClient::NOTIFY_PUBLISH_DENIED;
            } else if ($p3 == v::jt) {
                $d5 = MigratoryDataClient::NOTIFY_PUBLISH_OK;
            }
            $this->az->br(by::c6 . $d5 . " " . $l);
            $this->kd->onStatus($d5, $l);
            $hy = count($this->my);
            for ($fu = 0; $fu < $hy; $fu++) {
                if ($l === $this->my[$fu]) {
                    unset($this->my[$fu]);
                }
            }
            $this->my = array_values($this->my);
        }
    }
    private function oj($df)
    {
        $j = "";
        if (array_key_exists(el::em, $df)) {
            $j = $df[el::em];
        }
        if (array_key_exists(el::f6, $df)) {
            $d5 = $df[el::f6];
        }
        $this->az->br("Recovery status for subject: " . $j . " is " . $d5);
        if (v::k2 == $d5) {
            $k7 = $this->n0->kr();
            foreach ($k7 as $j) {
                $ka = $this->n0->cz($j);
                $p4 = $ka->d6();
                if (v::cr === $p4 ||
                    v::jz === $p4 ||
                    v::jy === $p4) {
                    $ka->d3();
                } else {
                    $ka->d1();
                }
            }
        } else {
            $ka = $this->n0->cz($j);
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
class n7
{
    const ek = 0;
    const ob = 1;
}
class mm
{
    const nq = 0;
    const nz = 1;
    const mn = 2;
}
class p5
{
    const p6 = 30;
    const p7 = 900;
    const p8 = 10;
    private $p9 = 3;
    private $pa = MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF;
    private $pb = 20;
    private $pc = 360;
    private $pd = 5;
    private $fe = 6;
    private $i9;
    private $ib;
    private $iz = false;
    private $pe = 1;
    private $pf = "";
    private $pg = 1000;
    private $i5 = MigratoryDataClient::TRANSPORT_WEBSOCKET;
    private $k7 = array();
    public function __construct($i9, $ib)
    {
        $this->i9 = $i9;
        $this->ib = $ib;
    }
    public function ph($k7, $cl)
    {
        foreach ($k7 as $j) {
            $this->k7[$j] = $cl;
        }
    }
    public function kp($k7)
    {
        foreach ($k7 as $j) {
            if (array_key_exists($j, $this->k7)) {
                unset($this->k7[$j]);
            }
        }
    }
    public function pi()
    {
        return $this->k7;
    }
    public function nc()
    {
        return $this->fe;
    }
    public function nb()
    {
        return $this->i9;
    }
    public function pj($iz)
    {
        $this->iz = $iz;
    }
    public function b9()
    {
        return $this->iz;
    }
    public function pk($pf)
    {
        $this->pf = $pf;
    }
    public function na()
    {
        return $this->pf;
    }
    public function pl($i5)
    {
        $this->i5 = $i5;
    }
    public function n3()
    {
        return $this->i5;
    }
    public function pm($p9)
    {
        $this->p9 = $p9;
    }
    public function pn()
    {
        return $this->p9;
    }
    public function po()
    {
        return $this->pa;
    }
    public function pp($pa)
    {
        $this->pa = $pa;
    }
    public function pq()
    {
        return $this->pb;
    }
    public function pr($pb)
    {
        $this->pb = $pb;
    }
    public function ps()
    {
        return $this->pd;
    }
    public function pt($pd)
    {
        $this->pd = $pd;
    }
    public function oz()
    {
        return $this->pe;
    }
    public function pu($pe)
    {
        $this->pe = $pe;
    }
    public function pv()
    {
        return $this->pc;
    }
    public function pw($pc)
    {
        $this->pc = $pc;
    }
    public function nd()
    {
        return $this->ib;
    }
    public function b7()
    {
        return $this->pg;
    }
    public function px($pg)
    {
        $this->pg = $pg;
    }
}
class n2
{
    private $py = null;
    private $pz = null;
    private $q0 = null;
    private $b0;
    private $au;
    private $q1 = p5::p6;
    public function __construct($n1, $au)
    {
        $this->b0 = $n1;
        $this->au = $au;
    }
    public function n6($o4, $q2)
    {
        if (isset($this->py)) {
            $this->au->b3()->cancelTimer($this->py);
        }
        $q3 = $this->q1;
        if ($q2 == n7::ek) {
            $q4 = $this->au->o6();
            $q3 = $this->q5($q4, true);
        }
        if ($q3 > 0) {
            $this->py = $this->au->b3()->addTimer($q3, function () use ($o4) {
                $mz = $this->au->bh();
                if (!isset($mz) || $mz !== $o4) {
                    return;
                }
                $this->au->o8(false);
                $this->au->ng();
                $this->au->nh();
                $this->bc($mz, v::jw);
            });
        }
    }
    public function bc($o4, $oy)
    {
        if ($this->au->o9() != mm::mn) {
            return;
        }
        $mz = $this->au->bh();
        if (!isset($mz) || $mz !== $o4) {
            return;
        }
        $this->au->o3(null);
        $this->au->ox($oy);
        $q4 = $this->au->o7();
        $q3 = $this->q5($q4, false);
        $this->q6($q3, $oy);
    }
    public function q6($q7, $oy)
    {
        if (isset($this->q0)) {
            $this->au->b3()->cancelTimer($this->q0);
        }
        $this->q0 = $this->au->b3()->addTimer($q7, function () use ($oy) {
            $this->au->np();
        });
    }
    public function ow($ac)
    {
        $this->q1 = $ac * 1.4;
    }
    public function n8()
    {
        if (isset($this->pz)) {
            $this->au->b3()->cancelTimer($this->pz);
        }
        $this->pz = $this->au->b3()->addTimer(p5::p7, function () {
            $this->au->nw();
            $this->n8();
        });
    }
    public function nr()
    {
        if (isset($this->py)) {
            $this->au->b3()->cancelTimer($this->py);
        }
        if (isset($this->pz)) {
            $this->au->b3()->cancelTimer($this->pz);
        }
        if (isset($this->q0)) {
            $this->au->b3()->cancelTimer($this->q0);
        }
    }
    private function q5($q4, $q8)
    {
        $q3 = $this->q1;
        if ($q4 > 0) {
            if ($q4 <= $this->b0->pn()) {
                $q3 = ($q4 * $this->b0->ps()) - floor((mt_rand() / mt_getrandmax()) * $this->b0->ps());
            } else {
                if ($this->b0->po() === MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF) {
                    $q9 = $q4 - $this->b0->pn();
                    $q3 = min(($this->b0->pq() * (2 ** $q9)) - floor((mt_rand() / mt_getrandmax()) * $this->b0->pq() * $q9), $this->b0->pv());
                } else {
                    $q3 = $this->b0->qa();
                }
            }
            if ($q8 && $q3 < p5::p8) {
                $q3 = p5::p8;
            }
        }
        return $q3;
    }
}
class qb
{
    private $qc = 3;
    private $f7;
    private $qd = false;
    private $n1 = null;
    private $au = null;
    private $je = null;
    private $aw = null;
    private $qe = null;
    private $az = null;
    public function __construct()
    {
        $this->f7 = "MigratoryDataClient/v6.0 React-PHP/" . phpversion();
        $this->n1 = new p5($this->qc, $this->f7);
        $this->az = new bu();
    }
    private function qf($m3, $qg)
    {
        if (!isset($m3)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: " . $qg . " - invalid first argument; expected an array of strings");
        }
        foreach ($m3 as $mb) {
            if (!is_string($mb)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: " . $qg . " - invalid first argument; expected an array of strings");
            }
        }
    }
    public function qh($aw)
    {
        if ($this->qd === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setLoop() method");
        }
        $this->aw = $aw;
    }
    public function pk($pf)
    {
        if ($this->qd === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setEntitlementToken() method");
        }
        if (trim($pf) === '') {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setEntitlementToken() - invalid argument; expected a non-empty string");
        }
        $this->n1->pk($pf);
        $this->az->be("Configuring entitlement token: " . $pf);
    }
    public function qi($je)
    {
        $this->qf($je, "setServers()");
        if ($this->qd === true) {
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
        $this->az->be("Setting servers to connect to: " . v::ki($je));
        $this->je = $je;
    }
    public function qj($kd)
    {
        if ($this->qd === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setListener() method");
        }
        $this->qe = $kd;
    }
    public function qk($bv, $bw)
    {
        if ($bw < 0 || $bw > 4) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setLogListener() - invalid second argument; expected a MigratoryDataLogLevel");
        }
        if ($this->qd === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "Error: setLogListener() - already connected; use this method before connect()");
        }
        $this->az->bx($bv, $bw);
    }
    public function n4()
    {
        if ($this->qd === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "connect() method");
        }
        if (!isset($this->aw)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setLoop().");
        }
        if (!isset($this->qe)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setListener()");
        }
        if (!isset($this->je)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setServers().");
        }
        $this->qd = true;
        $mi = new ja($this->je, $this->n1->b9());
        $this->au = new mh($this->n1, $mi, $this->aw, $this->qe, $this->az);
        $this->au->n4();
        $k7 = $this->n1->pi();
        $ql = array_keys($k7);
        foreach ($ql as $dl) {
            $this->au->ni(array($dl), $k7[$dl]);
            $this->az->br(by::cc . $dl);
        }
    }
    public function ng()
    {
        $this->az->be("Disconnect from push server and release all resources.");
        if ($this->qd === true) {
            $this->qd = false;
            $this->az->br(by::c9);
            $this->au->ns();
        }
    }
    public function ni($k7, $cl)
    {
        $this->qf($k7, "subscribe()");
        if (!isset($k7) || count($k7) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid first argument; expected a array of strings with size > 0");
        }
        if ($cl < 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid second argument; a int with value >= 0");
        }
        $this->az->be("Subscribing to: " . v::ki($k7));
        $this->n1->ph($k7, $cl);
        if ($this->qd) {
            $this->az->br(by::cc . v::ki($k7));
            $this->au->ni($k7, $cl);
        }
    }
    public function nm($k7)
    {
        $this->qf($k7, "subscribe()");
        if (!isset($k7) || count($k7) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: unsubscribe() - invalid argument; expected a array of strings with size > 0");
        }
        $this->az->be("Unsubscribing from: " . v::ki($k7));
        $this->n1->kp($k7);
        if ($this->qd) {
            $this->az->br(by::cd . v::ki($k7));
            $this->au->nm($k7);
        }
    }
    public function nt($bq)
    {
        if ($this->qd === false) {
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
        $this->au->nt($bq);
    }
    public function ny()
    {
        if (!$this->qd) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "pause() method");
        }
        $this->az->be("Migratorydata client calls pause");
        $this->az->br(by::ca);
        $this->au->ny();
    }
    public function o0()
    {
        if (!$this->qd) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "resume() method");
        }
        $this->az->be("Migratorydata client calls resume");
        $this->az->br(by::cb);
        $this->au->o0();
    }
    public function pi()
    {
        return array_keys($this->n1->pi());
    }
    public function qm($d8)
    {
        if ($d8 !== MigratoryDataClient::TRANSPORT_HTTP && $d8 !== MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Argument for set_transport must be MigratoryDataClient::TRANSPORT_WEBSOCKET or MigratoryDataClient::TRANSPORT_HTTP");
        }
        if ($this->qd === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setTransport() method");
        }
        $this->n1->pl($d8);
        $this->az->be("Configuring transport type to: " . $d8);
    }
    public function pj($i)
    {
        if ($this->qd === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setEncryption() method");
        }
        $this->n1->pj($i);
        $this->az->be("Configuring encryption to: " . v::w($i));
    }
    public function pm($dp)
    {
        if ($this->qd === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setQuickReconnectMaxRetries() method");
        }
        if ($dp < 2) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setQuickReconnectMaxRetries() - invalid argument; expected an integer higher or equal to 2");
        }
        $this->au->pm($dp);
        $this->az->be("Configuring quickreconnect max retries to: " . $dp);
    }
    public function pp($qn)
    {
        if ($this->qd === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectPolicy() method");
        }
        if (!isset($qn) || ($qn !== MigratoryDataClient::CONSTANT_WINDOWS_BACKOFF && $qn !== MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectPolicy() - invalid argument; expected MigratoryDataClient.CONSTANT_WINDOW_BACKOFF or MigratoryDataClient.TRUNCATED_EXPONENTIAL_BACKOFF");
        }
        $this->n1->pp($qn);
        $this->az->be("Configuring reconnect policy to: " . $qn);
    }
    public function pr($qo)
    {
        if ($this->qd === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectTimeInterval() method");
        }
        if ($qo < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectTimeInterval() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->n1->pr($qo);
        $this->az->be("Configuring setReconnectTime interval to: " . $qo);
    }
    public function qp($i3)
    {
        if ($this->qd === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "notifyAfterFailedConnectionAttempts() method");
        }
        if ($i3 < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: notifyAfterFailedConnectionAttempts() - invalid argument; expected a positive integer");
        }
        $this->n1->pu($i3);
        $this->az->be("Configuring the number of failed connection attempts before sending a notification: " . $i3);
    }
    public function pw($qq)
    {
        if ($this->qd === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectMaxDelay() method");
        }
        if ($qq < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectMaxDelay() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->n1->pw($qq);
        $this->az->be("Configuring setReconnectMax delay to: " . $qq);
    }
    public function pt($qo)
    {
        if ($this->qd === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setQuickReconnectInitialDelay() method");
        }
        if ($qo < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setQuickReconnectInitialDelay() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->n1->pt($qo);
        $this->az->be("Configuring quickReconnectInitial delay to: " . $qo);
    }
    public function qr()
    {
        return $this->qe;
    }
    public function qs($pg)
    {
        if ($this->qd === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setConnectionTimeout() method");
        }
        $this->n1->px($pg);
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
    private $qt = null;
    public function __construct()
    {
        $this->qt = new qb();
    }
    public function setLoop(\React\EventLoop\LoopInterface $aw)
    {
        $this->qt->qh($aw);
    }
    public function setListener(MigratoryDataListener $kd)
    {
        $this->qt->qj($kd);
    }
    public function setLogListener(MigratoryDataLogListener $bv, int $bw)
    {
        $this->qt->qk($bv, $bw);
    }
    public function setEntitlementToken(string $pf)
    {
        $this->qt->pk($pf);
    }
    public function setServers(array $je)
    {
        $this->qt->qi($je);
    }
    public function connect()
    {
        $this->qt->n4();
    }
    public function disconnect()
    {
        $this->qt->ng();
    }
    public function subscribe(array $k7)
    {
        $this->qt->ni($k7, 0);
    }
    public function subscribeWithHistory(array $k7, int $qu)
    {
        $this->qt->ni($k7, $qu);
    }
    public function unsubscribe(array $k7)
    {
        $this->qt->nm($k7);
    }
    public function publish(MigratoryDataMessage $bq)
    {
        $this->qt->nt($bq);
    }
    public function pause()
    {
        $this->qt->ny();
    }
    public function resume()
    {
        $this->qt->o0();
    }
    public function setTransport(string $d8)
    {
        $this->qt->qm($d8);
    }
    public function setEncryption(bool $i)
    {
        $this->qt->pj($i);
    }
    public function getSubjects()
    {
        return $this->qt->pi();
    }
    public function getListener()
    {
        return $this->qt->qr();
    }
    public function setQuickReconnectMaxRetries(int $q4)
    {
        $this->qt->pm($q4);
    }
    public function setReconnectPolicy(string $qn)
    {
        $this->qt->pp($qn);
    }
    public function setReconnectTimeInterval(int $qv)
    {
        $this->qt->pr($qv);
    }
    public function notifyAfterFailedConnectionAttempts(int $q4)
    {
        $this->qt->qp($q4);
    }
    public function setReconnectMaxDelay(int $qv)
    {
        $this->qt->pw($qv);
    }
    public function setQuickReconnectInitialDelay(int $qv)
    {
        $this->qt->pt($qv);
    }
    public function setConnectionTimeout(int $pg)
    {
        $this->qt->qs($pg);
    }
}
