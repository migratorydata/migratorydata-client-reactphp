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
	public function d($e, $f);
	public function g($h);
	public function i($e, $j, $f);
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
    private $k = "";
    private $l = "";
    private $m = "";
    private $n = "";
    private $o = null;
    protected $p = null;
    protected $q;
    protected $r;
    protected $s;
    protected $t = MessageType::UPDATE;
    public function __construct($subject, $content, $closure = "", $qos = QoS::GUARANTEED, $retained = true, $replySubject = "")
    {
        $this->k = $subject;
        $this->l = $content;
        $this->m = $closure;
        $this->o = $qos;
        $this->p = $retained;
        $this->n = $replySubject;
    }
    public function getSubject()
    {
        return $this->k;
    }
    public function getContent()
    {
        return $this->l;
    }
    public function getClosure()
    {
        return $this->m;
    }
    public function getQos()
    {
        return $this->o;
    }
    public function isRetained()
    {
        return $this->p;
    }
    public function getReplySubject()
    {
        return $this->n;
    }
    public function getMessageType()
    {
        return $this->t;
    }
    public function setCompressed($compressionBool)
    {
        $this->s = $compressionBool;
    }
    public function isCompressed()
    {
        return $this->s;
    }
    public function __toString()
    {
        $u = "GUARANTEED";
        if ($this->o === QoS::STANDARD) {
            $u = "STANDARD";
        }
        $v = "SNAPSHOT";
        if ($this->t === MessageType::UPDATE) {
            $v = "UPDATE";
        } else if ($this->t === MessageType::RECOVERED) {
            $v = "RECOVERED";
        } else if ($this->t === MessageType::HISTORICAL) {
            $v = "HISTORICAL";
        }
        return "[" .
            "subject=" .
            $this->k .
            ", content=" .
            $this->l .
            ", closure=" .
            $this->m .
            ", replySubject=" .
            $this->n .
            ", retained=" .
            w::x($this->p) .
            ", qos=" .
            $u .
            ", messageType=" .
            $v .
            ", seq=" .
            $this->q .
            ", epoch=" .
            $this->r .
            ", compression=" .
            w::x($this->s) .
            "]";
    }
}
class y
{
    private $z = "";
    private $a0 = -1;
    private $a1 = -1;
    private $a2 = -1;
    private $a3 = -1;
    private $a4 = 0;
    private $a5 = "";
    private $a6 = -1;
    public function __construct()
    {
    }
    public function a7($z)
    {
        $this->z .= $z;
    }
    public function a8($z)
    {
        $this->a5 .= $z;
    }
    public function a9()
    {
        $this->a6 = ($this->a6 == 3) ? 0 : ($this->a6 + 1);
        return $this->a5[$this->a6];
    }
    public function aa()
    {
        return $this->a4;
    }
    public function a4($a4)
    {
        $this->a4 = $a4;
    }
    public function ab($ac, $ad)
    {
        $this->z[$ac] = $ad;
    }
    public function ae($ac)
    {
        return $this->z[$ac];
    }
    public function af()
    {
        $this->a0 = strlen($this->z);
    }
    public function ag()
    {
        $this->a1 = strlen($this->z);
    }
    public function ah()
    {
        $this->a2 = strlen($this->z);
    }
    public function ai()
    {
        $this->a3 = strlen($this->z);
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
    public function am()
    {
        return $this->a3;
    }
    public function an($__data)
    {
        $this->z = $__data;
    }
    public function ao()
    {
        return $this->z;
    }
    public function ap()
    {
        if($this->a4 === 0){
            return $this->z;
        } else {
            return substr($this->z, $this->a4);
        }
    }
    public function aq()
    {
        return strlen($this->z);
    }
    public function ar()
    {
        $this->z = "";
        $this->a4 = 0;
    }
    public function at()
    {
        $this->z = substr($this->z, $this->a4);
        $this->a4 = 0;
    }
}
class au
{
    private $av;
    private $e;
    private $aw;
    private $ax;
    private $ay;
    private $az;
    private $b0;
    private $b1;
    private $b2 = null;
    private $b3 = array();
    private $h = null;
    public function __construct($av, $e, $aw,
                                $ay, $az, $b0)
    {
        $this->av = $av;
        $this->e = $e;
        $this->aw = $aw;
        $this->ax = $av->b4();
        $this->ay = $ay;
        $this->az = $az;
        $this->b0 = $b0;
        $this->b1 = $av->b5();
        $this->h = new y();
    }
    public function b6()
    {
        $b7 = new \React\Socket\Connector($this->ax, array(
            'tls' => array(
                'allow_self_signed' => true
            ),
            'timeout' => ($this->b1->b8() / 1000)
        ));
        $b9 = "";
        if ($this->b1->ba()) {
            $b9 = "tls://";
        }
        $b7->connect($b9 . $this->e . ":" . $this->aw)
            ->then(
                function (\React\Socket\ConnectionInterface $b2) {
                    $this->b2 = $b2;
                    if (count($this->b3) > 0) {
                        foreach ($this->b3 as $message) {
                            $b2->write($message);
                        }
                        $this->b3 = array();
                    }
                    $this->av->bb();
                    $b2->on('data', function ($z) {
                        if (isset($z) && strlen($z) !== 0) {
                            $this->h->a7($z);
                            $this->av->bc($this->h);
                            if ($this->h->aa() > 0 && $this->h->aa() < strlen($this->h->ao())) {
                                $this->h->at();
                            } else if ($this->h->aa() >= $this->h->aq()) {
                                $this->h->ar();
                            }
                        }
                    });
                    $b2->on('end', function () {
                        $this->av->bd($this->az, w::be, "socket_end");
                    });
                    $b2->on('close', function () {
                        $this->av->bd($this->az, w::be, "socket_close");
                    });
                    $b2->on('error', function (\Exception $e) {
                        $this->av->bd($this->az, w::be, "socket_error");
                    });
                },
                function (\Exception $exception) {
                    $this->b0->bf("Failed to connect to: " . $this->av->bg()->bh() . ", message: " . $exception->getMessage());
                    $this->ay->bd($this->av->bi(), w::bj);
                }
            );
    }
    public function bk($z)
    {
        if (isset($this->b2)) {
            $this->b2->write($z);
        } else {
            array_push($this->b3, $z);
        }
    }
    public function bl()
    {
        if (isset($this->b2)) {
            $this->b2->close();
            $this->b2 = null;
        }
    }
}
class bm implements MigratoryDataLogListener
{
    function onLog($log, $migratoryDataLogLevel)
    {
        if ($migratoryDataLogLevel === MigratoryDataLogLevel::TRACE) {
            $bn = "TRACE";
        } else if ($migratoryDataLogLevel === MigratoryDataLogLevel::DEBUG) {
            $bn = "DEBUG";
        } else if ($migratoryDataLogLevel === MigratoryDataLogLevel::INFO) {
            $bn = "INFO";
        } else if ($migratoryDataLogLevel === MigratoryDataLogLevel::WARN) {
            $bn = "WARN";
        } else if ($migratoryDataLogLevel === MigratoryDataLogLevel::ERROR) {
            $bn = "ERROR";
        }
        $bo = date('Y-m-d H:i:s');
        echo "[" . $bo . "] [" . $bn . "] " . $log . PHP_EOL;
    }
}
interface bp
{
    function bq($br);
    function bs($br);
    function bf($br);
    function bt($br);
    function bu($br);
}
class bv implements bp
{
    private $bw;
    private $bx = MigratoryDataLogLevel::INFO;
    public function __construct()
    {
        $this->bw = new bm();
    }
    public function by($bw, $bx)
    {
        $this->bw = $bw;
        $this->bx = $bx;
    }
    function bq($br)
    {
        if ($this->bx <= MigratoryDataLogLevel::TRACE) {
            $this->bw->onLog($br, MigratoryDataLogLevel::TRACE);
        }
    }
    function bs($br)
    {
        if ($this->bx <= MigratoryDataLogLevel::DEBUG) {
            $this->bw->onLog($br, MigratoryDataLogLevel::DEBUG);
        }
    }
    function bf($br)
    {
        if ($this->bx <= MigratoryDataLogLevel::INFO) {
            $this->bw->onLog($br, MigratoryDataLogLevel::INFO);
        }
    }
    function bt($br)
    {
        if ($this->bx <= MigratoryDataLogLevel::WARN) {
            $this->bw->onLog($br, MigratoryDataLogLevel::WARN);
        }
    }
    function bu($br)
    {
        if ($this->bx <= MigratoryDataLogLevel::ERROR) {
            $this->bw->onLog($br, MigratoryDataLogLevel::ERROR);
        }
    }
}
class bz
{
    const c0 = "[READ_EVENT] ";
    const c1 = "[PING_EVENT] ";
    const c2 = "[CONNECT_EVENT] ";
    const c3 = "[DISCONNECT_EVENT] ";
    const c4 = "[READER_DISCONNECT_EVENT] ";
    const c5 = "[MESSAGE_RECEIVED_EVENT] ";
    const c6 = "[WRITE_EVENT] ";
    const c7 = "[CLIENT_PUBLISH_RESPONSE] ";
    const c8 = "[ACK_FAILED_PUBLISH_WITH_CLOSURES] ";
    const c9 = "[ENTITLEMENT_CHECK_RESPONSE] ";
    const ca = "[DISPOSE_EVENT] ";
    const cb = "[PAUSE_EVENT] ";
    const cc = "[RESUME_EVENT] ";
    const cd = "[SUBSCRIBE_EVENT] ";
    const ce = "[UNSUBSCRIBE_EVENT] ";
    const cf = "[PUBLISH_EVENT] ";
    const cg = "[REPUBLISH_EVENT] ";
    const ch = "[PING_SERVER_EVENT] ";
    const ci = "[CONNECT_SERVER_EVENT] ";
    const cj = "[RECONNECT_EVENT] ";
}
class ck
{
    private $cl = 2;
    private $k;
    private $cm;
    private $q = 0;
    private $cn = 70000;
    private $co = false;
    private $cp = 0;
    private $cq = 0;
    private $cr = w::cs;
    private $ct = cu::cv;
    public function __construct($k, $cm)
    {
        $this->k = $k;
        $this->cm = $cm;
    }
    public function cw()
    {
        return $this->q;
    }
    public function cx($q)
    {
        $this->q = $q;
        $this->cq++;
    }
    public function cy()
    {
        return $this->cn;
    }
    public function cz($cn)
    {
        $this->cn = $cn;
    }
    public function d0()
    {
        return $this->k;
    }
    public function d1()
    {
        return $this->cm;
    }
    public function d2()
    {
        $this->cq = 0;
        if ($this->d3()) {
            $this->cp++;
        }
    }
    public function d4()
    {
        $this->cp = 0;
    }
    public function cq()
    {
        return $this->cq;
    }
    public function d5($d6)
    {
        $this->cr = $d6;
    }
    public function d7()
    {
        return $this->cr;
    }
    public function d3()
    {
        return $this->cn != 70000;
    }
    public function d8()
    {
        $d9 = cu::cv;
        if ($this->d3()) {
            if ($this->cp >= $this->cl) {
                if ($this->cm > 0) {
                    $d9 = cu::da;
                }
            } else {
                $d9 = cu::db;
            }
        } else {
            if ($this->cm > 0) {
                $d9 = cu::da;
            }
        }
        if ($d9 == cu::cv || $d9 == cu::da) {
            $this->d5(w::cs);
            $this->d4();
        }
        $this->ct = $d9;
        return $d9;
    }
    public function ct()
    {
        return $this->ct;
    }
    public function dc()
    {
        $this->ct = cu::cv;
    }
    public function dd()
    {
        $this->q = 0;
        $this->cn = 70000;
        $this->co = false;
        $this->cp = 0;
        $this->cq = 0;
        $this->cr = w::cs;
        $this->ct = cu::cv;
    }
    public function __toString()
    {
        return "[Subj=" .
            $this->k .
            ", Seq=" . $this->q .
            ", SeqId=" . $this->cn .
            ", NeedRecovery=" . w::x($this->co) .
            ", MessagesReceivedUntilRecovery=" . $this->cq .
            ", CacheRecoveryStatus=" . $this->cr .
            ", SubscribeType=" . $this->ct .
            ", NrOfConsecutiveRecovery=" . $this->cp .
            "]";
    }
}
class cu
{
    const cv = 0;
    const da = 1;
    const db = 2;
}
class de
{
    private $df;
    private $dg;
    public function __construct($df, $dg)
    {
        $this->df = $df;
        $this->dg = $dg;
    }
    public function dh()
    {
        return $this->df;
    }
    public function di()
    {
        return $this->dg;
    }
    public function __toString()
    {
        $dj = "";
        if (isset($this->dg) && isset($this->df)) {
            $dj .= "OPERATION " . $this->dk($this->df);
            $dj .= " Headers ";
            $dl = array_keys($this->dg);
            foreach ($dl as $dm) {
                $dn = $this->dp($dm);
                $dj .= $dn . ": " . $this->dg[$dm] . " - ";
            }
        }
        return $dj;
    }
    private function dk($dq)
    {
        switch ($dq) {
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
    private function dp($dq)
    {
        switch ($dq) {
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
class dr
{
    const ds = 0x00;
    const dt = 0x22;
    const du = 0x0A;
    const dv = 0x0D;
    const dw = 0x5C;
}
class dx
{
    public static $dy = array();
    public static $dz = array();
    public static $e0 = array();
    public static $e1 = array();
    public static $e2 = array();
    public static $dg = array();
    public static $e3 = array();
    const e4 = 0x19;
    const e5 = 0x7F;
    const e6 = 0x1E;
    const e7 = 0x1F;
    public static function e8()
    {
        self::$dy = array_fill(0, 128, -1);
        self::$dy[e9::ea] = 0x01;
        self::$dy[e9::eb] = 0x02;
        self::$dy[e9::ec] = 0x03;
        self::$dy[e9::ed] = 0x04;
        self::$dy[e9::ee] = 0x05;
        self::$dy[e9::ef] = 0x06;
        self::$dy[e9::eg] = 0x07;
        self::$dy[e9::eh] = 0x08;
        self::$dy[e9::ei] = 0x09;
        self::$dy[e9::ej] = 0x0B;
        self::$dy[e9::ek] = 0x0C;
        self::$dy[e9::el] = 0x0E;
        self::$dy[e9::em] = 0x0F;
        self::$dy[e9::en] = 0x10;
        self::$dy[e9::eo] = 0x11;
        self::$dy[e9::ep] = 0x12;
        self::$dy[e9::c7] = 0x13;
        self::$dy[e9::eq] = 0x14;
        self::$dy[e9::er] = 0x1A;
        self::$dy[e9::es] = 0x07;
        self::$dy[e9::et] = 0x0B;
        self::$dz = array_fill(0, 128, -1);
        self::$dz[eu::ev] = 0x01;
        self::$dz[eu::ew] = 0x02;
        self::$dz[eu::ex] = 0x03;
        self::$dz[eu::ey] = 0x04;
        self::$dz[eu::ez] = 0x05;
        self::$dz[eu::f0] = 0x06;
        self::$dz[eu::f1] = 0x07;
        self::$dz[eu::f2] = 0x08;
        self::$dz[eu::f3] = 0x09;
        self::$dz[eu::f4] = 0x0B;
        self::$dz[eu::f5] = 0x0C;
        self::$dz[eu::f6] = 0x0F;
        self::$dz[eu::f7] = 0x12;
        self::$dz[eu::f8] = 0x13;
        self::$dz[eu::f9] = 0x14;
        self::$dz[eu::fa] = 0x15;
        self::$dz[eu::fb] = 0x16;
        self::$dz[eu::fc] = 0x17;
        self::$dz[eu::fd] = 0x18;
        self::$dz[eu::fe] = 0x1A;
        self::$dz[eu::ff] = 0x27;
        self::$dz[eu::fg] = 0x23;
        self::$dz[eu::fh] = 0x24;
        self::$dz[eu::fi] = 0x25;
        self::$dz[eu::fj] = 0x10;
        self::$dz[eu::fk] = 0x11;
        self::$dz[eu::fl] = 0x28;
        self::$dz[eu::fm] = 0x2C;
        self::$dz[eu::fo] = 0x2D;
        self::$dz[eu::fp] = 0x30;
        self::$dz[eu::fq] = 0x1D;
        self::$dz[eu::fr] = 0x26;
        self::$e2 = array_fill(0, 128, -1);
        self::fs(eu::ev, ft::fu);
        self::fs(eu::ew, ft::fv);
        self::fs(eu::ex, ft::fw);
        self::fs(eu::ey, ft::fw);
        self::fs(eu::ez, ft::fw);
        self::fs(eu::f0, ft::fw);
        self::fs(eu::f1, ft::fv);
        self::fs(eu::f2, ft::fv);
        self::fs(eu::f3, ft::fv);
        self::fs(eu::f4, ft::fw);
        self::fs(eu::f5, ft::fv);
        self::fs(eu::f6, ft::fw);
        self::fs(eu::f7, ft::fu);
        self::fs(eu::f8, ft::fu);
        self::fs(eu::f9, ft::fu);
        self::fs(eu::fa, ft::fw);
        self::fs(eu::fb, ft::fw);
        self::fs(eu::fc, ft::fw);
        self::fs(eu::fd, ft::fw);
        self::fs(eu::fe, ft::fu);
        self::fs(eu::ff, ft::fu);
        self::fs(eu::fg, ft::fu);
        self::fs(eu::fh, ft::fw);
        self::fs(eu::fi, ft::fw);
        self::fs(eu::fj, ft::fu);
        self::fs(eu::fk, ft::fw);
        self::fs(eu::fl, ft::fw);
        self::fs(eu::fm, ft::fu);
        self::fs(eu::fo, ft::fw);
        self::fs(eu::fp, ft::fu);
        self::fs(eu::fq, ft::fw);
        self::fs(eu::fr, ft::fw);
        self::$e1 = array_fill(0, 255, -1);
        self::$e1[self::e5] = 0x01;
        self::$e1[self::e6] = 0x02;
        self::$e1[self::e7] = 0x03;
        self::$e1[dr::ds] = 0x04;
        self::$e1[dr::du] = 0x05;
        self::$e1[dr::dv] = 0x06;
        self::$e1[dr::dt] = 0x07;
        self::$e1[dr::dw] = 0x08;
        self::$e1[33] = 0x09;
        self::$e1[self::e4] = 0x0B;
        self::$e0 = array_fill(0, 255, -1);
        for ($i = 0; $i <= 128; $i++) {
            $e = self::fx($i);
            if ($e != -1) {
                self::$e0[$e] = $i;
            }
        }
        self::$dg = array_fill(0, 128, -1);
        for ($fy = 0; $fy <= eu::fr; $fy++) {
            self::$dg[self::fz($fy)] = $fy;
        }
        self::$e3 = array_fill(0, 128, -1);
        for ($fy = 0; $fy <= e9::et; $fy++) {
            self::$e3[self::g0($fy)] = $fy;
        }
    }
    public static function g1($z)
    {
        $g2 = array_merge(unpack('C*', $z));
        $g3 = 0;
        for ($fy = 0; $fy < count($g2); $fy++) {
            $g4 = self::fx($g2[$fy]);
            if ($g4 != -1) {
                $g3++;
            }
        }
        if ($g3 == 0) {
            return call_user_func_array("pack", array_merge(array("C*"), $g2));
        }
        $g5 = array_fill(0, count($g2) + $g3, 0);
        for ($fy = 0, $g6 = 0; $fy < count($g2); $fy++, $g6++) {
            $g4 = self::fx($g2[$fy]);
            if ($g4 != -1) {
                $g5[$g6] = self::e7;
                $g5[$g6 + 1] = $g4;
                $g6++;
            } else {
                $g5[$g6] = $g2[$fy];
            }
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g5));
    }
    public static function g7($z)
    {
        $g2 = array_merge(unpack('C*', $z));
        $g3 = 0;
        if (count($g2) == 0) {
            return $z;
        }
        for ($fy = 0; $fy < count($g2); $fy++) {
            if ($g2[$fy] == self::e7) {
                $g3++;
            }
        }
        $g5 = array_fill(0, count($g2) - $g3, 0);
        for ($fy = 0, $g6 = 0; $fy < count($g2); $fy++, $g6++) {
            $g8 = $g2[$fy];
            if ($g8 == self::e7) {
                if ($fy + 1 < count($g2)) {
                    $g5[$g6] = self::g9($g2[$fy + 1]);
                    if ($g5[$g6] == -1) {
                        throw new \InvalidArgumentException();
                    }
                    $fy++;
                } else {
                    throw new \InvalidArgumentException();
                }
            } else {
                $g5[$g6] = $g8;
            }
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g5));
    }
    public static function ga($z, $gb, $gc)
    {
        $gd = null;
        $ge = strpos($z, chr(self::fz($gb)));
        $gf = strpos($z, chr(self::e6), $ge);
        if ($ge !== false && $gf !== false) {
            $gg = substr($z, $ge + 1, $gf - ($ge + 1));
            switch ($gc) {
                case ft::gh:
                    $gd = $gg;
                    break;
                case ft::fv:
                    $gd = $gg;
                    break;
                case ft::fu:
                    $gd = $gg;
                    break;
                case ft::fw:
                    $gd = self::gi($gg);
                    break;
            }
        }
        return $gd;
    }
    public static function gi($gj)
    {
        $z = array_merge(unpack("C*", $gj));
        $g5 = 0;
        $gk = -1;
        $gl = 0;
        $gm;
        $g8;
        $gn = count($z);
        $ac = 0;
        if ($gn == 1) {
            return $z[0];
        } else if ($gn == 2 && $z[$ac] == self::e7) {
            $g8 = self::g9($z[$ac + 1]);
            if ($g8 != -1) {
                return $g8;
            } else {
                throw new \InvalidArgumentException();
            }
        }
        for (; $gn > 0; $gn--) {
            $g8 = $z[$ac];
            $ac++;
            if ($g8 == self::e7) {
                if ($gn - 1 < 0) {
                    throw new \InvalidArgumentException();
                }
                $gn--;
                $g8 = $z[$ac];
                $ac++;
                $gm = self::g9($g8);
                if ($gm == -1) {
                    throw new \InvalidArgumentException();
                }
            } else {
                $gm = $g8;
            }
            if ($gk > 0) {
                $gl |= $gm >> $gk;
                $g5 = $g5 << 8 | ($gl >= 0 ? $gl : $gl + 256);
                $gl = ($gm << (8 - $gk));
            } else {
                $gl = ($gm << -$gk);
            }
            $gk = ($gk + 7) % 8;
        }
        return $g5;
    }
    public static function go($gl)
    {
        if (($gl & 0xFFFFFF80) == 0) {
            $i = self::fx($gl);
            if ($i == -1) {
                return pack('C*', $gl);
            } else {
                return pack('C*', self::e7, $i);
            }
        }
        $gp = 0;
        if (($gl & 0xFF000000) != 0) {
            $gp = 24;
        } else if (($gl & 0x00FF0000) != 0) {
            $gp = 16;
        } else {
            $gp = 8;
        }
        $g5 = array_fill(0, 10, 0);
        $gq = 0;
        $gr = 0;
        while ($gp >= 0) {
            $b = (($gl >> $gp) & 0xFF);
            $gr++;
            $g5[$gq] |= ($b >= 0 ? $b : $b + 256) >> $gr;
            $g4 = self::fx($g5[$gq]);
            if ($g4 != -1) {
                $g5[$gq] = self::e7;
                $g5[$gq + 1] = $g4;
                $gq++;
            }
            $gq++;
            $g5[$gq] |= ($b << (7 - $gr)) & 0x7F;
            $gp -= 8;
        }
        $g4 = self::fx($g5[$gq]);
        if ($g4 != -1) {
            $g5[$gq] = self::e7;
            $g5[$gq + 1] = $g4;
            $gq++;
        }
        $gq++;
        if ($gq < count($g5)) {
            $g5 = array_slice($g5, 0, $gq);
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g5));
    }
    public static function g9($b)
    {
        return $b >= 0 ? self::$e0[$b] : -1;
    }
    public static function fx($b)
    {
        return $b >= 0 ? self::$e1[$b] : -1;
    }
    public static function fz($h)
    {
        return self::$dz[$h];
    }
    public static function gs($g8)
    {
        return self::$dg[$g8];
    }
    public static function g0($o)
    {
        return self::$dy[$o];
    }
    public static function dh($g8)
    {
        return self::$e3[$g8];
    }
    public static function gt()
    {
        return self::e4;
    }
    public static function fs($gu, $gv)
    {
        self::$e2[dx::fz($gu)] = $gv;
    }
    public static function gw($gu)
    {
        $gx = self::fz($gu);
        return self::$e2[$gx];
    }
}
class e9
{
    const ea = 0;
    const eb = 1;
    const ec = 2;
    const ed = 3;
    const ee = 4;
    const ef = 5;
    const eg = 6;
    const eh = 7;
    const ep = 8;
    const ei = 9;
    const ej = 10;
    const ek = 11;
    const el = 12;
    const em = 13;
    const eo = 14;
    const en = 15;
    const c7 = 16;
    const eq = 17;
    const er = 18;
    const es = 19;
    const et = 20;
}
class eu
{
    const ev = 0;
    const ew = 1;
    const ex = 2;
    const ey = 3;
    const ez = 4;
    const f0 = 5;
    const f1 = 6;
    const f2 = 7;
    const f3 = 8;
    const f4 = 9;
    const f5 = 10;
    const f6 = 11;
    const f7 = 12;
    const f8 = 13;
    const f9 = 14;
    const fa = 15;
    const fb = 16;
    const fc = 17;
    const fd = 18;
    const fe = 19;
    const ff = 20;
    const fg = 21;
    const fh = 22;
    const fi = 23;
    const fj = 24;
    const fk = 25;
    const fl = 26;
    const fm = 27;
    const fo = 28;
    const fp = 29;
    const fq = 30;
    const fr = 31;
}
class ft
{
    const gh = 0;
    const fv = 1;
    const fu = 2;
    const fw = 3;
}
class gy
{
    const gz = "1";
    const h0 = "2";
    const h1 = "3";
    const h2 = "4";
}
class h3
{
    const h4 = 4;
    const h5 = 8;
}
class h6
{
    const h7 = "d";
    const h8 = "a";
}
class h9
{
	const ha = 0;
	const hb = 1;
	const hc = 2;
	const hd = 3;
}
dx::e8();
class he implements c
{
	private $hf = "POST / HTTP/1.1";
	private $hg = "Host: ";
	private $hh = "Content-Length: ";
	private $hi = "00000";
	private $hj = "\r\n";
	public function __construct()
	{
	}
	public function d($e, $f)
	{
		$h = new y();
		$h->a7($this->hf);
		$h->a7($this->hj);
		$h->a7($this->hg);
		$h->a7(dx::g1($e));
		$h->a7($this->hj);
		foreach($f as $name => $value) {
			$h->a7($name);
			$h->a7(": ");
			$h->a7($value);
			$h->a7($this->hj);
		}
		$h->a7($this->hh);
		$h->af();
		$h->a7($this->hi);
		$h->a7($this->hj);
		$h->a7($this->hj);
		$h->ag();
		return $h;
	}
	public function g($h)
	{
		$ac = $h->aq();
		$hk = strval($ac - $h->ak());
		if (strlen($hk) <= strlen($this->hi)) {
			$b1 = 0;
			for ($fy = strlen($this->hi) - strlen($hk); $fy < strlen($this->hi); $fy++) {
				$h->ab($h->aj() + $fy, $hk[$b1]);
				$b1++;
			}
		} else {
			$hl = substr($h->ao(), 0, $h->aj());
			$hl .= $hk;
			$hl .= substr($h->ao(), $h->aj() + strlen($this->hi));
			$h->an($hl);
		}
	}
	public function i($e, $j, $f)
	{
		return "";
	}
}
class hm implements c
{
	private $hn = "GET /WebSocketConnection HTTP/1.1";
	private $ho = "GET /WebSocketConnection-Secure HTTP/1.1";
	private $hg = "Host: ";
	private $hp = "Origin: ";
	private $hq = "Upgrade: websocket";
	private $hr = "Sec-WebSocket-Key: ";
	private $hs = "Sec-WebSocket-Version: 13";
	private $ht = "Sec-WebSocket-Protocol: pushv1";
	private $hu = "Connection: Upgrade";
	private $hj = "\r\n";
	private $hv = 10;
	private $hw = -128;
	private $hx = -128;
	private $hy = 0x02;
	public function __construct()
	{
	}
	public function d($e, $f)
	{
		$h = new y();
		for ($fy = 0; $fy < $this->hv; $fy++) {
			$h->a7(chr(0x00));
		}
		for ($fy = 0; $fy < 4; $fy++) {
			$hz = chr(rand(0, 100));
			$h->a7($hz);
			$h->a8($hz);
		}
		$h->ah();
		return $h;
	}
	public function g($h)
	{
		$i0 = chr($this->hw) | chr($this->hy);
		$h->ai();
		$i1 = $h->am() - $h->al();
		$i2 = $this->i3($i1);
		$i4 = $this->i5($i1, $i2);
		$i6 = 0;
		if ($i2 === 1) {
			$i6 = 8;
			$h->ab($i6, $i0);
			$h->ab($i6 + 1, $i4[0] | chr($this->hx));
		} else if ($i2 === 2) {
			$i6 = 6;
			$h->ab($i6, $i0);
			$h->ab($i6 + 1, chr(126) | chr($this->hx));
			for ($fy = 0; $fy <= 1; $fy++) {
				$h->ab($i6 + 2 + $fy, $i4[$fy]);
			}
		} else {
			$h->ab($i6, $i0);
			$h->ab($i6 + 1, chr(127) | chr($this->hx));
			for ($fy = 0; $fy <= 7; $fy++) {
				$h->ab($i6 + 2 + $fy, $i4[$fy]);
			}
		}
		$h->a4($i6);
	}
	public function i($e, $j, $f)
	{
		$h = new y();
		if (!$j) {
			$h->a7($this->hn);
		} else {
			$h->a7($this->ho);
		}
		$h->a7($this->hj);
		$h->a7($this->hp);
		$h->a7("http://" . $e);
		$h->a7($this->hj);
		$h->a7($this->hg);
		$h->a7($e);
		$h->a7($this->hj);
		$h->a7($this->hq);
		$h->a7($this->hj);
		$h->a7($this->hu);
		$h->a7($this->hj);
		foreach($f as $name => $value) {
			$h->a7($name);
			$h->a7(": ");
			$h->a7($value);
			$h->a7($this->hj);
		}
		$h->a7($this->hr);
		$h->a7($this->i7());
		$h->a7($this->hj);
		$h->a7($this->hs);
		$h->a7($this->hj);
		$h->a7($this->ht);
		$h->a7($this->hj);
		$h->a7($this->hj);
		return $h;
	}
	private function i3($i8)
	{
		if ($i8 <= 125) {
			return 1;
		} else if ($i8 <= 65535) {
			return 2;
		}
		return 8;
	}
	private function i5($ad, $i2)
	{
		$h = "";
		$i9 = 8 * $i2 - 8;
		for ($fy = 0; $fy < $i2; $fy++) {
			$ia = $this->ib($ad, $i9 - 8 * $fy);
			$ic = $ia - (256 * intval($ia / 256));
			$h .= chr($ic);
		}
		return $h;
	}
	private function ib($gl, $id)
	{
		return ($gl % 0x100000000) >> $id;
	}
	private function i7() 
	{
		$key = '';
        for ($i = 0; $i < 16; $i++) {
            $key .= chr(rand(33, 126));
        }
        return base64_encode($key);
	}
}
class ie
{
    private $ez = h3::h5;
    private $ig = MigratoryDataClient::TRANSPORT_WEBSOCKET;
    public function __construct()
    {
    }
    public function ih()
    {
        $this->ig = MigratoryDataClient::TRANSPORT_HTTP;
        $this->ez = h3::h4;
    }
    public function ii($h, $ij, $ik, $il, $im)
    {
        if ($this->ig == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a7(chr(dx::g0(e9::er)));
        } else {
            $h->a7(chr(dx::g0(e9::er)) ^ $h->a9());
        }
        if (strlen($ij) > 0) {
            $h->a7($this->in(dx::fz(eu::f8), dx::g1($ij), $h));
        }
        $h->a7($this->in(dx::fz(eu::fh), dx::go($ik), $h));
        $h->a7($this->in(dx::fz(eu::fg), dx::g1($im), $h));
        $h->a7($this->in(dx::fz(eu::fo), dx::go($il), $h));
        $h->a7($this->in(dx::fz(eu::ez), dx::go($this->ez), $h));
        if ($this->ig == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a7(chr(dx::e5));
        } else {
            $h->a7(chr(dx::e5) ^ $h->a9());
        }
    }
    public function io($h, $k, $ip)
    {
        if ($this->ig == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a7(chr(dx::g0(e9::ea)));
        } else {
            $h->a7(chr(dx::g0(e9::ea)) ^ $h->a9());
        }
        $h->a7($this->in(dx::fz(eu::ev), dx::g1($k->d0()), $h));
        if (isset($ip) && $ip >= 0) {
            $h->a7($this->in(dx::fz(eu::f0), dx::go($ip), $h));
        }
        $iq = $k->d8();
        switch ($iq) {
            case cu::cv:
                break;
            case cu::da:
                $h->a7($this->in(dx::fz(eu::fl), dx::go($k->d1()), $h));
                break;
            case cu::db:
                $h->a7($this->in(dx::fz(eu::ey), dx::go($k->cy()), $h));
                $h->a7($this->in(dx::fz(eu::ex), dx::go($k->cw() + 1), $h));
                break;
        }
        $h->a7($this->in(dx::fz(eu::ez), dx::go($this->ez), $h));
        if ($this->ig == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a7(chr(dx::e5));
        } else {
            $h->a7(chr(dx::e5) ^ $h->a9());
        }
    }
    public function ir($h, $ip, $k)
    {
        if ($this->ig == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a7(chr(dx::g0(e9::eb)));
        } else {
            $h->a7(chr(dx::g0(e9::eb)) ^ $h->a9());
        }
        $h->a7($this->in(dx::fz(eu::ev), dx::g1($k), $h));
        if ($ip > 0) {
            $h->a7($this->in(dx::fz(eu::f0), dx::go($ip), $h));
        }
        $h->a7($this->in(dx::fz(eu::ez), dx::go($this->ez), $h));
        if ($this->ig == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a7(chr(dx::e5));
        } else {
            $h->a7(chr(dx::e5) ^ $h->a9());
        }
    }
    public function is($h, $ip)
    {
        if ($this->ig == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a7(chr(dx::g0(e9::eb)));
        } else {
            $h->a7(chr(dx::g0(e9::eb)) ^ $h->a9());
        }
        if ($ip > 0) {
            $h->a7($this->in(dx::fz(eu::f0), dx::go($ip), $h));
        }
        $h->a7($this->in(dx::fz(eu::ez), dx::go($this->ez), $h));
        if ($this->ig == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a7(chr(dx::e5));
        } else {
            $h->a7(chr(dx::e5) ^ $h->a9());
        }
    }
    public function it($h, $ip, $iu)
    {
        if ($this->ig == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a7(chr(dx::g0(e9::et)));
        } else {
            $h->a7(chr(dx::g0(e9::et)) ^ $h->a9());
        }
        if ($ip > 0) {
            $h->a7($this->in(dx::fz(eu::f0), dx::go($ip), $h));
        }
        if (strlen($iu) > 0) {
            $h->a7($this->in(dx::fz(eu::f8), dx::g1($iu), $h));
        }
        $h->a7($this->in(dx::fz(eu::ez), dx::go($this->ez), $h));
        if ($this->ig == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a7(chr(dx::e5));
        } else {
            $h->a7(chr(dx::e5) ^ $h->a9());
        }
    }
    public function iv($h, $br, $iw)
    {
        if ($this->ig == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a7(chr(dx::g0(e9::en)));
        } else {
            $h->a7(chr(dx::g0(e9::en)) ^ $h->a9());
        }
        $h->a7($this->in(dx::fz(eu::ev), dx::g1($br->getSubject()), $h));
        if ($br->isCompressed()) {
            $ix = $this->iy($br->getContent());
            if (strlen($ix) < strlen($br->getContent())) {
                $h->a7($this->in(dx::fz(eu::ew), dx::g1($ix), $h));
            } else {
                $h->a7($this->in(dx::fz(eu::ew), dx::g1($br->getContent()), $h));
                $br->setCompressed(false);
            }
        } else {
            $h->a7($this->in(dx::fz(eu::ew), dx::g1($br->getContent()), $h));
        }
        $n = $br->getReplySubject();
        if (strlen($n) > 0) {
            $h->a7($this->in(dx::fz(eu::fm), dx::g1($n), $h));
        }
        $m = $br->getClosure();
        if (strlen($m) > 0) {
            $h->a7($this->in(dx::fz(eu::fj), dx::g1($m), $h));
        }
        $h->a7($this->in(dx::fz(eu::f0), dx::go($iw), $h));
        if ($br->getQos() == QoS::GUARANTEED) {
            $h->a7($this->in(dx::fz(eu::fd), dx::go(QoS::GUARANTEED), $h));
        } else {
            $h->a7($this->in(dx::fz(eu::fd), dx::go(QoS::STANDARD), $h));
        }
        if ($br->isRetained() == true) {
            $h->a7($this->in(dx::fz(eu::fc), dx::go(1), $h));
        } else {
            $h->a7($this->in(dx::fz(eu::fc), dx::go(0), $h));
        }
        if ($br->isCompressed()) {
            $h->a7($this->in(dx::fz(eu::fr), dx::go(1), $h));
        }
        $h->a7($this->in(dx::fz(eu::ez), dx::go($this->ez), $h));
        if ($this->ig == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a7(chr(dx::e5));
        } else {
            $h->a7(chr(dx::e5) ^ $h->a9());
        }
    }
    private function in($gd, $z, $h)
    {
        $g5 = '';
        if ($this->ig == MigratoryDataClient::TRANSPORT_HTTP) {
            $g5 .= chr($gd);
            $g5 .= $z;
            $g5 .= chr(dx::e6);
        } else {
            $g5 .= chr($gd) ^ $h->a9();
            for ($fy = 0; $fy < strlen($z); $fy++) {
                $g5 .= $z[$fy] ^ $h->a9();
            }
            $g5 .= chr(dx::e6) ^ $h->a9();
        }
        return $g5;
    }
    public function iy($l)
    {
        $iz = gzdeflate($l);
        if ($iz === false) {
            return $l;
        }
        $j0 = base64_encode($iz);
        return $j0;
    }
    public function j1($z)
    {
        $j2 = base64_decode($z);
        if ($j2 === false) {
            return $z;
        }
        $j3 = gzinflate($j2);
        if ($j3 === false) {
            return $z;
        }
        return $j3;
    }
}
class j4
{
    const j5 = 80;
    const j6 = 443;
    const j7 = 100;
    private $e;
    private $aw;
    private $j8;
    private $j9 = self::j7;
    public function __construct($ja, $jb)
    {
        $this->j8 = $ja;
        $jc = explode(" ", $ja, 2);
        if (count($jc) == 2) {
            $j9 = intval($jc[0]);
            if ($j9 <= 0 || $j9 > 100) {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "the weight of a cluster member must be between 0 and 100, weight: " . $j9);
            }
            $this->j9 = intval($jc[0]);
            $ja = $jc[1];
        }
        $jd = strrpos($ja, '/');
        $je = $jd === false ? $ja : substr($ja, $jd + 1);
        $jf = strrpos($je, ':');
        if ($jf !== false) {
            $this->e = substr($je, 0, $jf);
            $this->aw = intval(substr($je, $jf + 1));
            if ($this->aw < 0 || $this->aw > 65535) {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $ja . " - invalid port number");
            }
            if ($this->e === "") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "Cluster member with null address");
            }
            if ($this->e === "*") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $ja . " - wildcard address (*) cannot be used to define a cluster member");
            }
        } else {
            $this->e = $je;
            if ($this->e === "") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "Cluster member with null address");
            }
            if ($this->e === "*") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $ja . " - wildcard address (*) cannot be used to define a cluster member");
            }
            if ($jb === false) {
                $this->aw = self::j5;
            } else {
                $this->aw = self::j6;
            }
        }
    }
    public function jg()
    {
        return $this->e;
    }
    public function jh()
    {
        return $this->aw;
    }
    public function ji()
    {
        return $this->j8;
    }
    public function jj()
    {
        return $this->j9;
    }
    public function jk($jl)
    {
        if ($this->jg() === $jl->jg()) {
            if ($this->jh() === $jl->jh()) {
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
            $this->aw .
            "]";
    }
}
class jm
{
    private $jn = array();
    private $jo = array();
    private $jp = null;
    public function __construct($jq, $jb)
    {
        foreach ($jq as $jr) {
            $this->jn[] = new j4($jr, $jb);
        }
    }
    public function js()
    {
        $jt = $this->ju();
        if (count($jt) === 0) {
            $this->jo = array();
            $jt = $this->jn;
        }
        $jv = $this->jw($jt);
        $this->jp = $jt[$jv];
        return $this->jp;
    }
    public function jx($jl)
    {
        array_push($this->jo, $jl);
    }
    public function bh()
    {
        return $this->jp;
    }
    private function ju()
    {
        $jt = array();
        foreach ($this->jn as $jl) {
            $jy = true;
            foreach ($this->jo as $jz) {
                if ($jl->jk($jz)) {
                    $jy = false;
                }
            }
            if ($jy) {
                array_push($jt, $jl);
            }
        }
        return $jt;
    }
    private function jw($jt)
    {
        $jv = -1;
        $k0 = 0;
        foreach ($jt as $jl) {
            $k0 = $k0 + $jl->jj();
        }
        if ($k0 === 0) {
            $jv = floor(count($jt) * (mt_rand() / mt_getrandmax()));
        } else {
            $j9 = floor($k0 * (mt_rand() / mt_getrandmax()));
            $k0 = 0;
            $fy = 0;
            foreach ($jt as $jl) {
                $k0 = $k0 + $jl->jj();
                if ($k0 > $j9) {
                    $jv = $fy;
                    break;
                }
                $fy++;
            }
        }
        return $jv;
    }
}
class k1 extends MigratoryDataMessage
{
    public function __construct($k, $l, $t, $m = "", $o = QoS::GUARANTEED, $p = true, $n = "", $s = false)
    {
        parent::__construct($k, $l, $m, $o, $p, $n);
        $this->t = $t;
        $this->s = $s;
    }
    public function cx($q)
    {
        $this->q = $q;
    }
    public function cw()
    {
        return $this->q;
    }
    public function k2($r)
    {
        $this->r = $r;
    }
    public function k3()
    {
        return $this->r;
    }
}
class w
{
    const k4 = "NOT_SUBSCRIBED";
    const k5 = "OK";
    const k6 = "FAILED";
    const k7 = "DENY";
    const be = "connection_passive_close";
    const k8 = "connection_active_close_keep_alive";
    const k9 = "connection_active_close_seq_higher";
    const bj = "connection_error";
    const cs = "cache_ok";
    const ka = "cache_ok_no_new_message";
    const kb = "cache_ok_new_epoch";
    const kc = "no_cache";
    const kd = "no_seq";
    const ke = "end";
    const kf = '/^\/([^\/]+\/)*([^\/]+|\*)$/';
    const kg = "\r\n\r\n";
    const hh = "Content-Length: ";
    public static function kh($gg)
    {
        return preg_match(self::kf, $gg);
    }
    public static function ki($kj)
    {
        $kk = array();
        foreach ($kj as $k) {
            if (isset($k) && w::kh($k)) {
                array_push($kk, $k);
            }
        }
        return $kk;
    }
    public static function kl($km, $kn, $ko, $kp, $b0)
    {
        // different epoch, reset and continue.
        if ($km->cy() !== $ko) {
            $km->cx($kn);
            $km->cz($ko);
            return kq::kr;
        }
        // if received seq is equal or smaller than the local seq then the message is ignored
        if ($kn <= $km->cw()) {
            return kq::ks;
        }
        // if received seq is +1 than the local seq then the message is processed
        if ($kn === ($km->cw() + 1)) {
            if ($km->ct() == cu::db) {
                $km->dc();
                $kp->onStatus(MigratoryDataClient::NOTIFY_DATA_SYNC, $km->d0());
                $b0->bs(bz::c5 . MigratoryDataClient::NOTIFY_DATA_SYNC . $km);
            }
            $km->cx($km->cw() + 1);
            return kq::kr;
        }
        // there is a hole in the order of the messages
        // if there is a missing message when the session is active, then we disconnect the client and make failover.
        if ($km->cq() > 0) {
            $b0->bs("Missing messages: expected message with sequence number: " . ($km->cw() + 1) . ", received instead message with sequence number:  " . $kn . " !");
            return kq::kt;
        }
        $b0->bs("Reset sequence: '" . ($km->cw() + 1) . "'. The new sequence is: '" . $kn . "' !");
        $km->cx($kn);
        $kp->onStatus(MigratoryDataClient::NOTIFY_DATA_RESYNC, $km->d0());
        $b0->bs(bz::c5 . MigratoryDataClient::NOTIFY_DATA_RESYNC . " " . $km);
        return kq::kr;
    }
    public static function ku($km, $kn, $ko, $kp, $b0)
    {
        // different epoch, reset and continue.
        if ($km->cy() !== $ko) {
            $km->cx($kn);
            $km->cz($ko);
            return kq::kr;
        }
        // if received seq is equal or smaller than the local seq then the message is ignored
        if ($kn <= $km->cw()) {
            return kq::ks;
        }
        if ($km->ct() == cu::db) {
            $km->dc();
        }
        $km->cx($kn);
        return kq::kr;
    }
    public static function kv($kw)
    {
        $kx = "";
        if (count($kw) > 0) {
            $kx .= "[";
            for ($fy = 0; $fy < count($kw); $fy++) {
                $kx .= $kw[$fy];
                if ($fy + 1 != count($kw)) {
                    $kx .= ", ";
                }
            }
            $kx .= "]";
        }
        return $kx;
    }
    public static function x($ky)
    {
        if ($ky) {
            return "true";
        }
        return "false";
    }
}
class kz
{
    private $l0 = array();
    public function l1($kj, $cm)
    {
        foreach ($kj as $k) {
            if (!array_key_exists($k, $this->l0)) {
                $km = new ck($k, $cm);
                $this->l0[$k] = $km;
            }
        }
    }
    public function l2($kj)
    {
        $l3 = array();
        foreach ($kj as $k) {
            if (array_key_exists($k, $this->l0)) {
                unset($this->l0[$k]);
                array_push($l3, $k);
            }
        }
        return $l3;
    }
    public function l4()
    {
        return array_keys($this->l0);
    }
    public function d0($k)
    {
        if (array_key_exists($k, $this->l0)) {
            return $this->l0[$k];
        }
        return null;
    }
    public function l5($k)
    {
        return array_key_exists($k, $this->l0);
    }
    public function l6()
    {
        $l7 = array_values($this->l0);
        foreach ($l7 as $l8) {
            $l8->dd();
        }
    }
}
class l9
{
    private $la;
    private $lb;
    public function __construct($la, $lb)
    {
        $this->la = $la;
        $this->lb = $lb;
    }
    public function lc()
    {
        return $this->la;
    }
    public function ld()
    {
        return $this->lb;
    }
}
class le
{
    public static function lf($h)
    {
        $lg = le::lh($h, 0);
        $ac = $lg->lc();
        if ($h->aq() < $lg->ld()) {
            $ac = -1;
        }
        if ($ac === -1) {
            return $ac;
        }
        while (ord($h->ae($ac)) === dx::e5) {
            $ac++;
        }
        return $ac;
    }
    public static function lh($h, $a4)
    {
        $li = new l9(-1, -1);
        if ($a4 == $h->aq()) {
            return $li;
        }
        $ac = $a4;
        $lj = 2;
        $lk = 0;
        $ll = 0;
        $lm = $h->aq() - $ac;
        if ($lm < $lj) {
            return $li;
        }
        $g8 = dx::gi($h->ae($ac));
        $i0 = ($g8 >> 7) & 0x01;
        $ln = $g8 & 0x40;
        $lo = $g8 & 0x20;
        $lp = $g8 & 0x10;
        if ($i0 !== 1 || $ln != 0 || $lo != 0 || $lp != 0) {
            return $li;
        }
        $ac++;
        $g8 = dx::gi($h->ae($ac));
        $lq = $g8 & 0x7F;
        if ($lq < 126) {
            $ll = 0;
            $lk = $lq;
        } else if ($lq === 126) {
            $ll = 2;
            if ($lm < $lj + $ll) {
                return $li;
            }
            $lr = "";
            for ($fy = $ac + 1; $fy <= $ac + $ll; $fy++) {
                $lr .= $h->ae($fy);
            }
            $lk = le::ls($lr);
            $ac += $ll;
        } else {
            $ll = 8;
            if ($lm < $lj + $ll) {
                return $li;
            }
            $lr = "";
            for ($fy = $ac + 1; $fy <= $ac + $ll; $fy++) {
                $lr .= $h->ae($fy);
            }
            $lk = le::ls($lr);
            $ac += $ll;
        }
        if ($lm < ($lj + $ll + $lk)) {
            return $li;
        }
        $ac += 1;
        return new l9($ac, $ac + $lk);
    }
    private static function ls($z)
    {
        if (strlen($z) === 2) {
            return (ord($z[0] & chr(0xFF)) << 8) | ord($z[1] & chr(0xFF));
        } else {
            $lt = ord($z[4] & chr(0x7F)) << 24;
            $lu = ord($z[5] & chr(0xFF)) << 16;
            $lv = ord($z[6] & chr(0xFF)) << 8;
            $lw = ord($z[7] & chr(0xFF));
            $lx = $lt | $lu | $lv | $lw;
            return $lx;
        }
    }
}
class ly
{
    public static function lz($h)
    {
        $m0 = $h->aa();
        if ($h->ae($m0) == "H") {
            $m0 = self::m1($h);
        }
        if ($m0 == -1) {
            return array();
        }
        $h->a4($m0);
        $m2 = array();
        while (true) {
            if ($m0 >= $h->aq()) {
                return $m2;
            }
            if (dx::gi($h->ae($m0)) == dx::gt()) {
                $m0++;
            } else {
                $lg = le::lh($h, $m0);
                $m3 = $lg->lc();
                $m4 = $lg->ld();
                if ($m3 == -1) {
                    return $m2;
                }
                while (true) {
                    $fy = self::m5($h, $m3, $m4, chr(dx::e5));
                    if ($fy == -1) {
                        break;
                    }
                    $dg = self::m6($h, $m3 + 1, $fy);
                    if ($dg != null) {
                        $m7 = new de(dx::dh(ord($h->ae($m3))), $dg);
                        array_push($m2, $m7);
                    }
                    $m3 = $fy + 1;
                    $h->a4($m3);
                }
                $m0 = $h->aa();
            }
        }
    }
    public static function m8($h)
    {
        $m0 = ly::m9($h);
        if ($m0 == -1) {
            return array();
        }
        $h->a4($m0);
        $m2 = array();
        $ac = $h->aa();
        while (true) {
            $fy = self::m5($h, $ac, $h->aq(), chr(dx::e5));
            if ($fy == -1) {
                break;
            }
            $ma = $h->ae($ac);
            if ($ma == "H") {
                $mb = ly::m8($h);
                foreach ($mb as $mc) {
                    array_push($m2, $mc);
                }
                break;
            }
            $dg = ly::m6($h, $ac + 1, $fy);
            $m7 = new de(dx::dh(ord($h->ae($ac))), $dg);
            array_push($m2, $m7);
            $ac = $fy + 1;
            $h->a4($ac);
        }
        return $m2;
    }
    public static function m6($h, $la, $lb)
    {
        $dg = null;
        while (true) {
            if ($la >= $lb) {
                break;
            }
            $gu = ord($h->ae($la));
            $md = self::m5($h, $la + 1, $lb, chr(dx::e6));
            if ($md == -1) {
                return null;
            }
            $gd = dx::gs($gu);
            if ($gd === null) {
                $la = $md + 1;
                continue;
            }
            $la++;
            if ($dg == null) {
                $dg = array();
            }
            $ad = null;
            $me = substr($h->ao(), $la, $md - $la);
            switch (dx::gw($gd)) {
                case ft::fw:
                    $ad = dx::gi($me);
                    break;
                case ft::fu:
                    $ad = dx::g7($me);
                    break;
                case ft::fv:
                    $ad = dx::g7($me);
                    break;
                case ft::gh:
                    $ad = $me;
                    break;
            }
            if (!array_key_exists($gd, $dg)) {
                $dg[$gd] = $ad;
            } else {
                $mf = $dg[$gd];
                if (is_array($mf)) {
                    array_push($mf, $ad);
                } else {
                    $mg = array();
                    array_push($mg, $mf);
                    array_push($mg, $ad);
                    $dg[$gd] = $mg;
                }
            }
            $la = $md + 1;
        }
        return $dg;
    }
    public static function m9($h)
    {
        $mh = $h->aa();
        $z = $h->ap();
        $mi = dx::g1(w::hh);
        $ac = ly::mj($mi, $z);
        if ($ac == -1) {
            return -1;
        }
        $ac += strlen($mi);
        $mk = "\r";
        $ml = ly::m5($h, $ac, $h->aq(), $mk);
        if ($ml == -1) {
            return -1;
        }
        $mm = substr($z, $ac, $ml - $ac);
        $mn = intval($mm);
        $ac = ly::mj(w::kg, $z);
        if ($ac == -1) {
            return $ac;
        }
        $ac += strlen(w::kg);
        if (($ac + $mn) > strlen($z)) {
            return -1;
        }
        return $mh + $ac;
    }
    private static function m5($h, $la, $lb, $mo)
    {
        for ($fy = $la; $fy < $lb; $fy++) {
            $x = $h->ae($fy);
            if ($h->ae($fy) == $mo) {
                return $fy;
            }
        }
        return -1;
    }
    private static function mj($mp, $mq)
    {
        $mc = strlen($mp);
        $id = strlen($mq);
        $mr = array_fill(0, $mc, 0);
        ly::ms($mp, $mc, $mr);
        $fy = 0;
        $g6 = 0;
        while ($fy < $id) {
            if ($mp[$g6] == $mq[$fy]) {
                $g6++;
                $fy++;
            }
            if ($g6 == $mc) {
                return $fy - $g6;
            } else if ($fy < $id && $mp[$g6] != $mq[$fy]) {
                if ($g6 != 0)
                    $g6 = $mr[$g6 - 1];
                else
                    $fy = $fy + 1;
            }
        }
        return -1;
    }
    private static function ms($mp, $mc, &$mr)
    {
        $gn = 0;
        $mr[0] = 0;
        $fy = 1;
        while ($fy < $mc) {
            if ($mp[$fy] == $mp[$gn]) {
                $gn++;
                $mr[$fy] = $gn;
                $fy++;
            } else {
                if ($gn != 0) {
                    $gn = $mr[$gn - 1];
                } else {
                    $mr[$fy] = 0;
                    $fy++;
                }
            }
        }
    }
    private static function m1($h)
    {
        $mt = "\r\n\r\n";
        $ac = $h->aa();
        $fy = self::mj($mt, $h->ap());
        if ($fy == -1) {
            return -1;
        }
        $ac = $fy + strlen($mt);
        return $ac;
    }
}
class Version
{
        //      6       mu   xx   mu xxx
    // push version mu API ID mu API version
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
class mv
{
    private $b1 = null;
    private $e = null;
    private $mw = null;
    private $ax = null;
    private $kp = null;
    private $mx = false;
    private $my = false;
    private $ay = null;
    private $mz = n0::n1;
    private $n2 = null;
    private $n3 = null;
    private $n4 = null;
    private $ip = -1;
    private $n5 = false;
    private $n6 = 0;
    private $n7 = false;
    private $n8 = 0;
    private $n9 = na::nb;
    private $nc = null;
    private $nd = null;
    private $ne = array();
    private $nf = null;
    private $ng;
    private $b0 = null;
    public function __construct($nh, $mw, $ax, $kp, $b0)
    {
        $this->b1 = $nh;
        $this->mw = $mw;
        $this->ax = $ax;
        $this->kp = $kp;
        $this->b0 = $b0;
        $this->ay = new ni($this->b1, $this);
        $this->ng = new kz();
        $this->n3 = new ie();
        if ($nh->nj() === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            $this->n2 = new hm();
        } else {
            $this->n2 = new he();
            $this->n3->ih();
        }
    }
    public function nk()
    {
        $this->nf = uniqid();
        $nl = $this->mw->js();
        $this->b0->bf("Connecting to the cluster member: " . $nl . ", using API version: " . Version::VERSION);
        $this->n4 = new au($this, $nl->jg(), $nl->jh(), $this->ay, $this->nf, $this->b0);
        $this->n4->b6();
    }
    public function bb()
    {
        if ($this->b1->nj() !== MigratoryDataClient::TRANSPORT_HTTP) {
            $h = $this->n2->i($this->mw->bh()->jg(), $this->b1->ba(), $this->b1->nm());
            $this->n4->bk($h->ap());
        }
        $this->ay->nn($this->nf, no::er);
        $this->ay->np();
        $this->nq();
    }
    public function nq()
    {
        $h = $this->n2->d($this->mw->bh()->jg(), $this->b1->nm());
        $this->n3->ii($h, $this->b1->nr(), $this->b1->ns(), $this->b1->nt(), $this->b1->nu());
        $this->n2->g($h);
        $this->n4->bk($h->ap());
    }
    public function bd($az, $nv, $nw)
    {
        if ($az === $this->nf) {
            $this->mx = false;
            $this->b0->bs(bz::c4 . $this->nf . " " . $nw);
            $this->nx();
            $this->ny();
            $this->ay->bd($this->nf, w::be);
        }
    }
    public function nz($kj, $cm)
    {
        if (!isset($kj) || count($kj) == 0) {
            return;
        }
        $kj = w::ki($kj);
        $o0 = array_diff($kj, $this->ng->l4());
        if (count($o0) == 0) {
            return 0;
        }
        $this->ng->l1($o0, $cm);
        if ($this->mx) {
            $this->o1($o0);
        }
    }
    private function o1($kj)
    {
        $h = $this->n2->d($this->mw->bh()->jg(), $this->b1->nm());
        foreach ($kj as $k) {
            $this->o2($h, $this->ng->d0($k));
        }
        $this->n2->g($h);
        $this->n4->bk($h->ap());
    }
    private function o2($h, $k)
    {
        $this->n3->io($h, $k, $this->ip);
    }
    public function o3($kj)
    {
        if (!isset($kj) || count($kj) == 0) {
            return;
        }
        $o4 = array_intersect($kj, $this->ng->l4());
        if (count($o4) == 0) {
            return;
        }
        $l3 = $this->ng->l2($o4);
        if ($this->mx) {
            $this->o5($l3);
        }
    }
    private function o5($kj)
    {
        $h = $this->n2->d($this->mw->bh()->jg(), $this->b1->nm());
        foreach ($kj as $k) {
            $this->n3->ir($h, $this->ip, $k);
        }
        $this->n2->g($h);
        $this->n4->bk($h->ap());
    }
    public function o6()
    {
        $this->nx();
        if ($this->mz == n0::o7) {
            return;
        }
        $this->mw->jx($this->mw->bh());
        $this->my = true;
        $this->nk();
    }
    public function nx()
    {
        $this->ay->o8();
        $this->dd();
        if (isset($this->n4)) {
            $this->n4->bl();
        }
        $this->n4 = null;
    }
    private function dd()
    {
        $this->mx = false;
        $this->ip = -1;
        $this->n7 = false;
    }
    public function o9()
    {
        $this->mz = n0::o7;
        $this->nx();
    }
    public function oa($iu) {
        $h = $this->n2->d($this->mw->bh()->jg(), $this->b1->nm());
        $this->n3->it($h, $this->ip, $iu);
        $this->n2->g($h);
        $this->n4->bk($h->ap());        
    }
    public function ob($br)
    {
        if (!$this->mx) {
            $this->oc(MigratoryDataClient::NOTIFY_PUBLISH_FAILED, $br);
            return;
        }
        $this->od($br);
    }
    public function od($br)
    {
        $n = $br->getReplySubject();
        if (strlen($n) > 0 && w::kh($n) && !$this->ng->l5($n)) {
            $this->nz(array($n), 0);
        }
        $h = $this->n2->d($this->mw->bh()->jg(), $this->b1->nm());
        $this->n3->iv($h, $br, $this->ip);
        $this->n2->g($h);
        if (isset($this->nd) && ($h->aq() - $h->aa()) > $this->nd) {
            $this->oc(MigratoryDataClient::NOTIFY_MESSAGE_SIZE_LIMIT_EXCEEDED, $br);
            return;
        }
        $m = $br->getClosure();
        if (isset($m) && strlen($m) > 0) {
            array_push($this->ne, $m);
        }
        $this->n4->bk($h->ap());
    }
    public function ny()
    {
        foreach ($this->ne as $m) {
            $this->b0->bs(bz::c8 . $m);
            $this->kp->onStatus(MigratoryDataClient::NOTIFY_PUBLISH_FAILED, $m);
        }
        $this->ne = array();
    }
    public function oe()
    {
        $h = $this->n2->d($this->mw->bh()->jg(), $this->b1->nm());
        $this->n3->is($h, $this->ip);
        $this->n2->g($h);
        $this->n4->bk($h->ap());
    }
    public function oc($of, $br)
    {
        if (isset($br) && strlen($br->getClosure()) > 0) {
            $this->kp->onStatus($of, $br->getClosure());
        }
    }
    public function og()
    {
        if ($this->mz != n0::n1) {
            return;
        }
        $this->b0->bf("Call pause");
        $this->mz = n0::oh;
        $this->nx();
    }
    public function oi()
    {
        if ($this->mz != n0::oh) {
            return;
        }
        $this->b0->bf("Call resume");
        $this->mz = n0::n1;
        $this->oj();
        $this->o6();
    }
    public function b4()
    {
        return $this->ax;
    }
    public function ok()
    {
        return $this->b0;
    }
    public function bg()
    {
        return $this->mw;
    }
    public function bi()
    {
        return $this->nf;
    }
    public function ol($om)
    {
        $this->nf = $om;
    }
    public function on()
    {
        return $this->mx;
    }
    public function oo()
    {
        return $this->n8;
    }
    public function op()
    {
        $this->n8++;
        return $this->n8;
    }
    public function oq($mx)
    {
        $this->mx = $mx;
    }
    public function os()
    {
        return $this->mz;
    }
    public function b5()
    {
        return $this->b1;
    }
    public function bc($h)
    {
        if ($this->b1->nj() === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            $m2 = ly::lz($h);
        } else {
            $m2 = ly::m8($h);
        }
        if (count($m2) > 0) {
            $this->ot($m2);
        } else {
            $this->b0->bs(bz::c1);
            $this->ay->nn($this->nf, no::ou);
        }
    }
    private function ot($m2)
    {
        foreach ($m2 as $br) {
            switch ($br->dh()) {
                case e9::ec:
                case e9::ei:
                case e9::c7:
                case e9::eh:
                case e9::er:
                case e9::ea:
                case e9::eb:
                case e9::es:
                    $this->b0->bs(bz::c0 . " " . $br);
                    $this->ov($br);
                    break;
                case e9::ed:
                    $this->b0->bs(bz::c1);
                    $this->ay->nn($this->nf, no::ou);
                    break;
                case e9::en:
                    break;
                default:
                    $this->b0->bt("No existing opeartion for message: " . $br);
            }
        }
    }
    private function ov($br)
    {
        $this->ay->nn($this->nf, no::ou);
        $dg = $br->di();
        switch ($br->dh()) {
            case e9::ec:
                $this->ow($dg);
                break;
            case e9::ea:
                $this->ox($dg);
                break;
            case e9::er:
                $this->oy($dg);
                break;
            case e9::eb:
                $this->oz($dg);
                break;
            case e9::ei:
                $this->p0($dg);
                break;
            case e9::c7:
                $this->p1($dg);
                break;
            case e9::eh:
                $this->p2($dg);
                break;
            case e9::es:
                $this->p3($dg);
                break;    
            default:
                $this->b0->bt("No existing opeartion for message: " . $br);
        }
    }
    private function ow($dg)
    {
        if (array_key_exists(eu::ev, $dg)) {
            $k = $dg[eu::ev];
            $km = $this->ng->d0($k);
            if (!isset($km)) {
                return;
            }
        }
        if (array_key_exists(eu::fp, $dg)) {
            $p4 = $dg[eu::fp];
            $this->p5($p4);
        }
        if (array_key_exists(eu::ew, $dg)) {
            $z = $dg[eu::ew];
        }
        $p = false;
        if (array_key_exists(eu::fc, $dg)) {
            $p6 = $dg[eu::fc];
            if ($p6 === 1) {
                $p = true;
            }
        }
        $s = false;
        if (array_key_exists(eu::fr, $dg)) {
            $p7 = $dg[eu::fr];
            if ($p7 === 1) {
                $s = true;
            }
        }
        if ($s) {
            $z = $this->n3->j1($z);
        }
        $p8 = MessageType::UPDATE;
        if (array_key_exists(eu::ff, $dg)) {
            $t = $dg[eu::ff];
            switch ($t) {
                case gy::gz:
                    $p8 = MessageType::SNAPSHOT;
                    break;
                case gy::h1:
                    $p8 = MessageType::RECOVERED;
                    break;
                case gy::h2:
                    $p8 = MessageType::HISTORICAL;
                    break;
            }
        }
        $o = QoS::GUARANTEED;
        if (array_key_exists(eu::fd, $dg)) {
            $p9 = $dg[eu::fd];
            if ($p9 === QoS::STANDARD) {
                $o = QoS::STANDARD;
            }
        }
        $m = "";
        if (array_key_exists(eu::fj, $dg)) {
            $m = $dg[eu::fj];
        }
        $n = "";
        if (array_key_exists(eu::fm, $dg)) {
            $n = $dg[eu::fm];
        }
        if ($this->n9 == na::pa && $o == QoS::GUARANTEED) {
            $pb = new k1($k, $z, $p8, $m, $o, $p, $n, $s);
            if (array_key_exists(eu::ex, $dg)) {
                $q = $dg[eu::ex];
            }
            if (array_key_exists(eu::ey, $dg)) {
                $cn = $dg[eu::ey];
            }
            $pb->cx($q);
            $pb->k2($cn);
            $pc = w::kl($km, $q, $cn, $this->kp, $this->b0);
            if ($pc == kq::kr) {
                $this->b0->bs(bz::c5 . $pb);
                $this->kp->onMessage($pb);
            } else if ($pc == kq::kt) {
                $this->bd($this->nf, w::k9, "seq_higher");
            }
        } else if ($this->n9 == na::pd && $o == QoS::GUARANTEED) {
            $pb = new k1($k, $z, $p8, $m, $o, $p, $n, $s);
            if (array_key_exists(eu::ex, $dg)) {
                $q = $dg[eu::ex];
            }
            if (array_key_exists(eu::ey, $dg)) {
                $cn = $dg[eu::ey];
            }
            $pb->cx($q);
            $pb->k2($cn);
            $pc = w::ku($km, $q, $cn, $this->kp, $this->b0);
            if ($pc == kq::kr) {
                $this->b0->bs(bz::c5 . $pb);
                $this->kp->onMessage($pb);
            }            
        } else {
            $pb = new k1($k, $z, $p8, "", $o, $p, $n, $s);
            $this->b0->bs(bz::c5 . $pb);
            $this->kp->onMessage($pb);
        }
    }
    private function ox($dg)
    {
    }
    private function p3($dg) {
        $d6 = $dg[eu::f9];
        $bf = $dg[eu::f8];
        $this->kp->onStatus($d6, $bf);
    }
    private function oy($dg)
    {
        if (array_key_exists(eu::f0, $dg)) {
            $ip = $dg[eu::f0];
            $this->pe();
            $this->ip = $ip;
            $this->n7 = true;
            $this->n8 = 0;
            if (array_key_exists(eu::fk, $dg)) {
                $pf = $dg[eu::fk];
                if ($pf == 1) {
                    $this->n9 = na::pa;
                } else if ($pf == 2) {
                    $this->n9 = na::pd;
                }
            }
            if (array_key_exists(eu::fi, $dg)) {
                $pg = $dg[eu::fi];
                $this->ay->ph($pg);
                $this->ay->nn($this->nf, no::ou);
            }
            $this->mx = true;
            if (array_key_exists(eu::fp, $dg)) {
                $p4 = $dg[eu::fp];
                $this->p5($p4);
            }
            if (array_key_exists(eu::fq, $dg)) {
                $this->nd = $dg[eu::fq];
            }
            $pi = "";
            if (array_key_exists(eu::f9, $dg)) {
                $pi = $dg[eu::f9];
            }
            $pj = MigratoryDataClient::NOTIFY_CONNECT_OK;
            if (array_key_exists(eu::f4, $dg)) {
                $bu = $dg[eu::f4];
                if ($bu == h9::hd) {
                    $pj = MigratoryDataClient::NOTIFY_CONNECT_DENY;
                }
            }
            $this->kp->onStatus($pj, $pi);
            $kj = $this->ng->l4();
            if (count($kj)) {
                $this->o1($kj);
            }
        }
    }
    private function oj()
    {
        $this->n5 = false;
        $this->n6 = 0;
    }
    private function pe()
    {
        $this->b0->bf("Connected to cluster member: " . $this->mw->bh());
        $this->oj();
        $this->b0->bs(bz::c2 . MigratoryDataClient::NOTIFY_SERVER_UP . " " . $this->nf);
        $this->kp->onStatus(MigratoryDataClient::NOTIFY_SERVER_UP, $this->mw->bh()->ji());
    }
    public function pk($pl)
    {
        $this->b0->bu("[" . $pl . "] [" . $this->mw->bh() . "]");
        $this->b0->bf("Lost connection with the cluster member: " . $this->mw->bh());
        if (!$this->n7) {
            $this->n6++;
            if (!$this->n5) {
                if ($this->n6 >= $this->b1->pm()) {
                    $this->b0->bs(bz::c3 . $pl);
                    $this->n5 = true;
                    $this->kp->onStatus(MigratoryDataClient::NOTIFY_SERVER_DOWN, $this->mw->bh()->ji());
                }
            }
        }
    }
    private function p5($p4)
    {
        if (isset($this->nc)) {
            if ($p4 !== $this->nc) {
                $this->nc = $p4;
                // reset epoch and seq
                $this->ng->l6();
            }
        } else {
            $this->nc = $p4;
        }
    }
    private function oz($dg)
    {
    }
    private function p0($dg)
    {
        if (array_key_exists(eu::f9, $dg)
            && array_key_exists(eu::ev, $dg)) {
            $pn = $dg[eu::f9];
            $k = $dg[eu::ev];
            $po = true;
            $pp = MigratoryDataClient::NOTIFY_SUBSCRIBE_DENY;
            if ($pn == h6::h8) {
                $pp = MigratoryDataClient::NOTIFY_SUBSCRIBE_ALLOW;
                $po = false;
            } else if ($pn == h6::h7) {
                $pp = MigratoryDataClient::NOTIFY_SUBSCRIBE_DENY;
            }
            if ($po) {
                $this->ng->l2(array($k));
            }
            $this->b0->bs(bz::c9 . $k . " " . $pn . " " . $pp);
            $this->kp->onStatus($pp, $k);
        }
    }
    private function p1($dg)
    {
        if (!isset($dg)) {
            return;
        }
        if (array_key_exists(eu::fj, $dg)
            && array_key_exists(eu::f9, $dg)) {
            $m = $dg[eu::fj];
            $pq = $dg[eu::f9];
            $d6 = MigratoryDataClient::NOTIFY_PUBLISH_FAILED;
            if ($pq == w::k7) {
                $d6 = MigratoryDataClient::NOTIFY_PUBLISH_DENIED;
            } else if ($pq == w::k5) {
                $d6 = MigratoryDataClient::NOTIFY_PUBLISH_OK;
            }
            $this->b0->bs(bz::c7 . $d6 . " " . $m);
            $this->kp->onStatus($d6, $m);
            $i8 = count($this->ne);
            for ($fy = 0; $fy < $i8; $fy++) {
                if ($m === $this->ne[$fy]) {
                    unset($this->ne[$fy]);
                }
            }
            $this->ne = array_values($this->ne);
        }
    }
    private function p2($dg)
    {
        $k = "";
        if (array_key_exists(eu::ev, $dg)) {
            $k = $dg[eu::ev];
        }
        if (array_key_exists(eu::ff, $dg)) {
            $d6 = $dg[eu::ff];
        }
        $this->b0->bs("Recovery status for subject: " . $k . " is " . $d6);
        if (w::ke == $d6) {
            $kj = $this->ng->l4();
            foreach ($kj as $k) {
                $km = $this->ng->d0($k);
                $pr = $km->d7();
                if (w::cs === $pr ||
                    w::kb === $pr ||
                    w::ka === $pr) {
                    $km->d4();
                } else {
                    $km->d2();
                }
            }
        } else {
            $km = $this->ng->d0($k);
            if (isset($km)) {
                $km->d5($d6);
            }
        }
    }
}
class kq
{
    const kr = 0;
    const ks = 1;
    const kt = 2;
}
class no
{
    const er = 0;
    const ou = 1;
}
class n0
{
    const o7 = 0;
    const oh = 1;
    const n1 = 2;
}
class na
{
    const nb = 0;
    const pa = 1;
    const pd = 2;
}
class ps
{
    const pt = 30;
    const pu = 900;
    const pv = 10;
    private $pw = 3;
    private $px = MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF;
    private $py = 20;
    private $pz = 360;
    private $q0 = 5;
    private $fo = Version::VERSION;
    private $ik;
    private $im;
    private $jb = false;
    private $q1 = 1;
    private $iu = "";
    private $q2 = 1000;
    private $ig = MigratoryDataClient::TRANSPORT_WEBSOCKET;
    private $kj = array();
	private $f = [];
    public function __construct($ik, $im)
    {
        $this->ik = $ik;
        $this->im = $im;
    }
    public function q3($kj, $cm)
    {
        foreach ($kj as $k) {
            $this->kj[$k] = $cm;
        }
    }
    public function l2($kj)
    {
        foreach ($kj as $k) {
            if (array_key_exists($k, $this->kj)) {
                unset($this->kj[$k]);
            }
        }
    }
    public function q4()
    {
        return $this->kj;
    }
    public function nt()
    {
        return $this->fo;
    }
    public function ns()
    {
        return $this->ik;
    }
    public function q5($jb)
    {
        $this->jb = $jb;
    }
    public function ba()
    {
        return $this->jb;
    }
    public function q6($iu)
    {
        $this->iu = $iu;
    }
    public function nr()
    {
        return $this->iu;
    }
    public function q7($ig)
    {
        $this->ig = $ig;
    }
    public function nj()
    {
        return $this->ig;
    }
    public function q8($pw)
    {
        $this->pw = $pw;
    }
    public function q9()
    {
        return $this->pw;
    }
    public function qa()
    {
        return $this->px;
    }
    public function qb($px)
    {
        $this->px = $px;
    }
    public function qc()
    {
        return $this->py;
    }
    public function qd($py)
    {
        $this->py = $py;
    }
    public function qe()
    {
        return $this->q0;
    }
    public function qf($q0)
    {
        $this->q0 = $q0;
    }
    public function pm()
    {
        return $this->q1;
    }
    public function qg($q1)
    {
        $this->q1 = $q1;
    }
    public function qh()
    {
        return $this->pz;
    }
    public function qi($pz)
    {
        $this->pz = $pz;
    }
    public function nu()
    {
        return $this->im;
    }
    public function b8()
    {
        return $this->q2;
    }
    public function qj($q2)
    {
        $this->q2 = $q2;
    }
    public function qk($ql, $ad)
	{
		$this->f[$ql] = $ad;
	}
    public function nm() {
        return $this->f;
    }
}
class ni
{
    private $qm = null;
    private $qn = null;
    private $qo = null;
    private $b1;
    private $av;
    private $qp = ps::pt;
    public function __construct($nh, $av)
    {
        $this->b1 = $nh;
        $this->av = $av;
    }
    public function nn($om, $qq)
    {
        if (isset($this->qm)) {
            $this->av->b4()->cancelTimer($this->qm);
        }
        $qr = $this->qp;
        if ($qq == no::er) {
            $qs = $this->av->oo();
            $qr = $this->qt($qs, true);
        }
        if ($qr > 0) {
            $this->qm = $this->av->b4()->addTimer($qr, function () use ($om) {
                $nf = $this->av->bi();
                if (!isset($nf) || $nf !== $om) {
                    return;
                }
                $this->av->oq(false);
                $this->av->nx();
                $this->av->ny();
                $this->bd($nf, w::k8);
            });
        }
    }
    public function bd($om, $pl)
    {
        if ($this->av->os() != n0::n1) {
            return;
        }
        $nf = $this->av->bi();
        if (!isset($nf) || $nf !== $om) {
            return;
        }
        $this->av->ol(null);
        $this->av->pk($pl);
        $qs = $this->av->op();
        $qr = $this->qt($qs, false);
        $this->qu($qr, $pl);
    }
    public function qu($qv, $pl)
    {
        if (isset($this->qo)) {
            $this->av->b4()->cancelTimer($this->qo);
        }
        $this->qo = $this->av->b4()->addTimer($qv, function () use ($pl) {
            $this->av->o6();
        });
    }
    public function ph($ad)
    {
        $this->qp = $ad * 1.4;
    }
    public function np()
    {
        if (isset($this->qn)) {
            $this->av->b4()->cancelTimer($this->qn);
        }
        $this->qn = $this->av->b4()->addTimer(ps::pu, function () {
            $this->av->oe();
            $this->np();
        });
    }
    public function o8()
    {
        if (isset($this->qm)) {
            $this->av->b4()->cancelTimer($this->qm);
        }
        if (isset($this->qn)) {
            $this->av->b4()->cancelTimer($this->qn);
        }
        if (isset($this->qo)) {
            $this->av->b4()->cancelTimer($this->qo);
        }
    }
    private function qt($qs, $qw)
    {
        $qr = $this->qp;
        if ($qs > 0) {
            if ($qs <= $this->b1->q9()) {
                $qr = ($qs * $this->b1->qe()) - floor((mt_rand() / mt_getrandmax()) * $this->b1->qe());
            } else {
                if ($this->b1->qa() === MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF) {
                    $qx = $qs - $this->b1->q9();
                    $qr = min(($this->b1->qc() * (2 ** $qx)) - floor((mt_rand() / mt_getrandmax()) * $this->b1->qc() * $qx), $this->b1->qh());
                } else {
                    $qr = $this->b1->qy();
                }
            }
            if ($qw && $qr < ps::pv) {
                $qr = ps::pv;
            }
        }
        return $qr;
    }
}
class qz
{
    private $r0 = 3;
    private $fg;
    private $r1 = false;
    private $nh = null;
    private $av = null;
    private $jq = null;
    private $ax = null;
    private $r2 = null;
    private $b0 = null;
    public function __construct()
    {
        $this->fg = "MigratoryDataClient/v6.0 React-PHP/" . phpversion() . ", version: " . Version::VERSION;
        $this->nh = new ps($this->r0, $this->fg);
        $this->b0 = new bv();
    }
    private function r3($mg, $r4)
    {
        if (!isset($mg)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: " . $r4 . " - invalid first argument; expected an array of strings");
        }
        foreach ($mg as $mo) {
            if (!is_string($mo)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: " . $r4 . " - invalid first argument; expected an array of strings");
            }
        }
    }
    public function r5($ax)
    {
        if ($this->r1 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setLoop() method");
        }
        $this->ax = $ax;
    }
    public function q6($iu)
    {
        if (trim($iu) === '') {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setEntitlementToken() - invalid argument; expected a non-empty string");
        }
        $this->nh->q6($iu);
        $this->b0->bf("Configuring entitlement token: " . $iu);
        if ($this->r1 === true) {
            $this->av->oa($iu);
        }
    }
    public function r6($jq)
    {
        $this->r3($jq, "setServers()");
        if ($this->r1 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setServers() method");
        }
        if (!is_array($jq) || count($jq) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setServers() - invalid argument; expected a array of strings with size > 0");
        }
        foreach ($jq as $addr) {
            if (!isset($addr) || trim($addr) === '') {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setServers() - invalid argument; expected a array of strings with size > 0");
            }
        }
        $this->b0->bf("Setting servers to connect to: " . w::kv($jq));
        $this->jq = $jq;
    }
    public function r7($kp)
    {
        if ($this->r1 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setListener() method");
        }
        $this->r2 = $kp;
    }
    public function r8($bw, $bx)
    {
        if ($bx < 0 || $bx > 4) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setLogListener() - invalid second argument; expected a MigratoryDataLogLevel");
        }
        if ($this->r1 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "Error: setLogListener() - already connected; use this method before connect()");
        }
        $this->b0->by($bw, $bx);
    }
    public function nk()
    {
        if ($this->r1 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "connect() method");
        }
        if (!isset($this->ax)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setLoop().");
        }
        if (!isset($this->r2)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setListener()");
        }
        if (!isset($this->jq)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setServers().");
        }
        $this->r1 = true;
        $mw = new jm($this->jq, $this->nh->ba());
        $this->av = new mv($this->nh, $mw, $this->ax, $this->r2, $this->b0);
        $this->av->nk();
        $kj = $this->nh->q4();
        $r9 = array_keys($kj);
        foreach ($r9 as $dm) {
            $this->av->nz(array($dm), $kj[$dm]);
            $this->b0->bs(bz::cd . $dm);
        }
    }
    public function nx()
    {
        $this->b0->bf("Disconnect from push server and release all resources.");
        if ($this->r1 === true) {
            $this->r1 = false;
            $this->b0->bs(bz::ca);
            $this->av->o9();
        }
    }
    public function nz($kj, $cm)
    {
        $this->r3($kj, "subscribe()");
        if (!isset($kj) || count($kj) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid first argument; expected a array of strings with size > 0");
        }
        foreach ($kj as $k) {
            if (is_null($k) || strlen($k) == 0 || !w::kh($k)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid argument; expected a valid topic with a non-empty value");
            }    
        }
        if ($cm < 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid second argument; a int with value >= 0");
        }
        $this->b0->bf("Subscribing to: " . w::kv($kj));
        $this->nh->q3($kj, $cm);
        if ($this->r1) {
            $this->b0->bs(bz::cd . w::kv($kj));
            $this->av->nz($kj, $cm);
        }
    }
    public function o3($kj)
    {
        $this->r3($kj, "subscribe()");
        if (!isset($kj) || count($kj) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: unsubscribe() - invalid argument; expected a array of strings with size > 0");
        }
        foreach ($kj as $k) {
            if (is_null($k) || strlen($k) == 0 || !w::kh($k)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid argument; expected a valid topic with a non-empty value");
            }    
        }
        $this->b0->bf("Unsubscribing from: " . w::kv($kj));
        $this->nh->l2($kj);
        if ($this->r1) {
            $this->b0->bs(bz::ce . w::kv($kj));
            $this->av->o3($kj);
        }
    }
    public function ob($br)
    {
        if ($this->r1 === false) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_CONNECTED, "publish() method");
        }
        $k = $br->getSubject();
        $l = $br->getContent();
        if (is_null($k) || strlen($k) == 0 || !w::kh($k)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: publish() - invalid argument; expected a valid message with a non-empty topic");
        }
        if (is_null($l) || strlen($l) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: publish() - invalid argument; expected a valid message with a non-empty content");
        }
        $this->b0->bs(bz::cf . $br);
        $this->av->ob($br);
    }
    public function og()
    {
        if (!$this->r1) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "pause() method");
        }
        $this->b0->bf("Migratorydata client calls pause");
        $this->b0->bs(bz::cb);
        $this->av->og();
    }
    public function oi()
    {
        if (!$this->r1) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "resume() method");
        }
        $this->b0->bf("Migratorydata client calls resume");
        $this->b0->bs(bz::cc);
        $this->av->oi();
    }
    public function q4()
    {
        return array_keys($this->nh->q4());
    }
    public function ra($d9)
    {
        if ($d9 !== MigratoryDataClient::TRANSPORT_HTTP && $d9 !== MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Argument for set_transport must be MigratoryDataClient::TRANSPORT_WEBSOCKET or MigratoryDataClient::TRANSPORT_HTTP");
        }
        if ($this->r1 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setTransport() method");
        }
        $this->nh->q7($d9);
        $this->b0->bf("Configuring transport type to: " . $d9);
    }
    public function q5($j)
    {
        if ($this->r1 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setEncryption() method");
        }
        $this->nh->q5($j);
        $this->b0->bf("Configuring encryption to: " . w::x($j));
    }
	public function qk($ql, $ad)
	{
		if ($this->r1 === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setHttpHeader() method");
		}
		if (is_null($ql) || strlen($ql) == 0) {
			throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "setHttpHeader() - name is empty");
		}
		if (is_null($ad) || strlen($ad) == 0) {
			throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "setHttpHeader() - value is empty");
		}
		$this->nh->qk($ql, $ad);
        $this->b0->bf("Configuring http header to: " . $ql . ': ' . $ad);
	}
    public function q8($dq)
    {
        if ($this->r1 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setQuickReconnectMaxRetries() method");
        }
        if ($dq < 2) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setQuickReconnectMaxRetries() - invalid argument; expected an integer higher or equal to 2");
        }
        $this->av->q8($dq);
        $this->b0->bf("Configuring quickreconnect max retries to: " . $dq);
    }
    public function qb($rb)
    {
        if ($this->r1 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectPolicy() method");
        }
        if (!isset($rb) || ($rb !== MigratoryDataClient::CONSTANT_WINDOWS_BACKOFF && $rb !== MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectPolicy() - invalid argument; expected MigratoryDataClient.CONSTANT_WINDOW_BACKOFF or MigratoryDataClient.TRUNCATED_EXPONENTIAL_BACKOFF");
        }
        $this->nh->qb($rb);
        $this->b0->bf("Configuring reconnect policy to: " . $rb);
    }
    public function qd($rc)
    {
        if ($this->r1 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectTimeInterval() method");
        }
        if ($rc < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectTimeInterval() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->nh->qd($rc);
        $this->b0->bf("Configuring setReconnectTime interval to: " . $rc);
    }
    public function rd($id)
    {
        if ($this->r1 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "notifyAfterFailedConnectionAttempts() method");
        }
        if ($id < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: notifyAfterFailedConnectionAttempts() - invalid argument; expected a positive integer");
        }
        $this->nh->qg($id);
        $this->b0->bf("Configuring the number of failed connection attempts before sending a notification: " . $id);
    }
    public function qi($re)
    {
        if ($this->r1 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectMaxDelay() method");
        }
        if ($re < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectMaxDelay() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->nh->qi($re);
        $this->b0->bf("Configuring setReconnectMax delay to: " . $re);
    }
    public function qf($rc)
    {
        if ($this->r1 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setQuickReconnectInitialDelay() method");
        }
        if ($rc < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setQuickReconnectInitialDelay() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->nh->qf($rc);
        $this->b0->bf("Configuring quickReconnectInitial delay to: " . $rc);
    }
    public function rf()
    {
        return $this->r2;
    }
    public function rg($q2)
    {
        if ($this->r1 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setConnectionTimeout() method");
        }
        $this->nh->qj($q2);
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
    private $rh = null;
    public function __construct()
    {
        $this->rh = new qz();
    }
    public function setLoop(\React\EventLoop\LoopInterface $ax)
    {
        $this->rh->r5($ax);
    }
    public function setListener(MigratoryDataListener $kp)
    {
        $this->rh->r7($kp);
    }
    public function setLogListener(MigratoryDataLogListener $bw, int $bx)
    {
        $this->rh->r8($bw, $bx);
    }
    public function setEntitlementToken(string $iu)
    {
        $this->rh->q6($iu);
    }
    public function setServers(array $jq)
    {
        $this->rh->r6($jq);
    }
    public function connect()
    {
        $this->rh->nk();
    }
    public function disconnect()
    {
        $this->rh->nx();
    }
    public function subscribe(array $kj)
    {
        $this->rh->nz($kj, 0);
    }
    public function subscribeWithHistory(array $kj, int $ri)
    {
        $this->rh->nz($kj, $ri);
    }
    public function unsubscribe(array $kj)
    {
        $this->rh->o3($kj);
    }
    public function publish(MigratoryDataMessage $br)
    {
        $this->rh->ob($br);
    }
    public function pause()
    {
        $this->rh->og();
    }
    public function resume()
    {
        $this->rh->oi();
    }
    public function setTransport(string $d9)
    {
        $this->rh->ra($d9);
    }
    public function setHttpHeader($ql, $ad)
	{
		$this->rh->qk($ql, $ad);
	}
    public function setEncryption(bool $j)
    {
        $this->rh->q5($j);
    }
    public function getSubjects()
    {
        return $this->rh->q4();
    }
    public function getListener()
    {
        return $this->rh->rf();
    }
    public function setQuickReconnectMaxRetries(int $qs)
    {
        $this->rh->q8($qs);
    }
    public function setReconnectPolicy(string $rb)
    {
        $this->rh->qb($rb);
    }
    public function setReconnectTimeInterval(int $rj)
    {
        $this->rh->qd($rj);
    }
    public function notifyAfterFailedConnectionAttempts(int $qs)
    {
        $this->rh->rd($qs);
    }
    public function setReconnectMaxDelay(int $rj)
    {
        $this->rh->qi($rj);
    }
    public function setQuickReconnectInitialDelay(int $rj)
    {
        $this->rh->qf($rj);
    }
    public function setConnectionTimeout(int $q2)
    {
        $this->rh->rg($q2);
    }
}
