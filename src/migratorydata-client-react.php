<?php
namespace MigratoryData\Client;
class MigratoryDataField
{
    private $a;
    private $b;
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
    public function getName()
    {
        return $this->a;
    }
    public function getValue()
    {
        return $this->b;
    }
    public function __toString()
    {
        $c = "[";
        if ($this->a === null) {
            $c .= "null";
        } else {
            $c .= $this->a;
        }
        $c .= " : ";
        if ($this->b === null) {
            $c .= "null";
        } else {
            $c .= $this->b;
        }
        $c .= "]";
        return $c;
    }
}
class d
{
    private $e;
    private $f;
    private $g;
    public function __construct($e, $f, $g)
    {
        $this->e = $e;
        $this->f = $f;
        $this->g = $g;
    }
    public function h()
    {
        return $this->e;
    }
    public function i()
    {
        return $this->f;
    }
    public function j()
    {
        return $this->g;
    }
}
class MigratoryDataException extends \Exception
{
    const E_INVALID_URL = 1;
    const E_RUNNING = 2;
    const E_NOT_CONNECTED = 3;
    const E_ILLEGAL_ARGUMENT = 4;
    const E_NOT_SET = 5;
    protected $k = array();
    protected $l = "";
    protected $code = -1;
    protected $message = "";
    public function getCause()
    {
        return $this->l;
    }
    public function getDetail()
    {
        return $this->message;
    }
    public function getExceptions()
    {
        return $this->k;
    }
    public function __construct($code, $cause = "", $exceptions = array())
    {
        $this->code = $code;
        $this->l = $cause;
        $this->k = $exceptions;
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
interface m
{
	public function n($o);
	public function p($q);
	public function r($o, $s);
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
class MigratoryDataMessage
{
    private $e = "";
    private $t = "";
    private $u = "";
    private $v = "";
    private $w = array();
    protected $x;
    protected $y;
    protected $z = null;
    protected $a0 = null;
    protected $a1 = array();
    public function __construct($subject, $content, $closure = "", $fields = array(), $replySubject = "")
    {
        $this->e = $subject;
        $this->t = $content;
        $this->u = $closure;
        $this->w = $fields;
        $this->v = $replySubject;
    }
    public function getSubject()
    {
        return $this->e;
    }
    public function getContent()
    {
        return $this->t;
    }
    public function getClosure()
    {
        return $this->u;
    }
    public function getReplySubject()
    {
        return $this->v;
    }
    public function isSnapshot()
    {
        return $this->z;
    }
    public function isRecovery()
    {
        return $this->a0;
    }
    public function getFields()
    {
        return $this->w;
    }
    public function getFieldMap()
    {
        return $this->a1;
    }
    public function __toString()
    {
        return "[" .
            "subject=" .
            $this->e .
            ", content=" .
            $this->t .
            ", replySubject=" .
            $this->v .
            ", closure=" .
            $this->u .
            ", fields=" .
            a2::a3($this->w) .
            ", snapshot=" .
            a2::a4($this->z) .
            ", recovery=" .
            a2::a4($this->a0) .
            ", seq=" .
            $this->x .
            ", epoch=" .
            $this->y .
            "]";
    }
}
class a5
{
    private $a6 = "";
    private $a7 = -1;
    private $a8 = -1;
    private $a9 = -1;
    private $aa = -1;
    private $ab = 0;
    private $ac = "";
    private $ad = -1;
    public function __construct()
    {
    }
    public function ae($a6)
    {
        $this->a6 .= $a6;
    }
    public function af($a6)
    {
        $this->ac .= $a6;
    }
    public function ag()
    {
        $this->ad = ($this->ad == 3) ? 0 : ($this->ad + 1);
        return $this->ac[$this->ad];
    }
    public function ah()
    {
        return $this->ab;
    }
    public function ab($ab)
    {
        $this->ab = $ab;
    }
    public function ai($aj, $b)
    {
        $this->a6[$aj] = $b;
    }
    public function ak($aj)
    {
        return $this->a6[$aj];
    }
    public function al()
    {
        $this->a7 = strlen($this->a6);
    }
    public function am()
    {
        $this->a8 = strlen($this->a6);
    }
    public function an()
    {
        $this->a9 = strlen($this->a6);
    }
    public function ao()
    {
        $this->aa = strlen($this->a6);
    }
    public function ap()
    {
        return $this->a7;
    }
    public function aq()
    {
        return $this->a8;
    }
    public function ar()
    {
        return $this->a9;
    }
    public function at()
    {
        return $this->aa;
    }
    public function au($__data)
    {
        $this->a6 = $__data;
    }
    public function av()
    {
        return $this->a6;
    }
    public function aw()
    {
        if($this->ab === 0){
            return $this->a6;
        } else {
            return substr($this->a6, $this->ab);
        }
    }
    public function ax()
    {
        return strlen($this->a6);
    }
    public function ay()
    {
        $this->a6 = "";
        $this->ab = 0;
    }
    public function az()
    {
        $this->a6 = substr($this->a6, $this->ab);
        $this->ab = 0;
    }
}
class b0
{
    private $b1;
    private $o;
    private $b2;
    private $b3;
    private $b4;
    private $b5;
    private $b6;
    private $b7;
    private $b8 = null;
    private $b9 = array();
    private $q = null;
    public function __construct($b1, $o, $b2,
                                $b4, $b5, $b6)
    {
        $this->b1 = $b1;
        $this->o = $o;
        $this->b2 = $b2;
        $this->b3 = $b1->ba();
        $this->b4 = $b4;
        $this->b5 = $b5;
        $this->b6 = $b6;
        $this->b7 = $b1->bb();
        $this->q = new a5();
    }
    public function bc()
    {
        $bd = new \React\Socket\Connector($this->b3, array(
            'tls' => array(
                'allow_self_signed' => true
            ),
            'timeout' => ($this->b7->be() / 1000)
        ));
        $bf = "";
        if ($this->b7->bg()) {
            $bf = "tls://";
        }
        $bd->connect($bf . $this->o . ":" . $this->b2)
            ->then(
                function (\React\Socket\ConnectionInterface $b8) {
                    $this->b8 = $b8;
                    if (count($this->b9) > 0) {
                        foreach ($this->b9 as $message) {
                            $b8->write($message);
                        }
                        $this->b9 = array();
                    }
                    $this->b1->bh();
                    $b8->on('data', function ($a6) {
                        if (isset($a6) && strlen($a6) !== 0) {
                            $this->q->ae($a6);
                            $this->b1->bi($this->q);
                            if ($this->q->ah() > 0 && $this->q->ah() < strlen($this->q->av())) {
                                $this->q->az();
                            } else if ($this->q->ah() >= $this->q->ax()) {
                                $this->q->ay();
                            }
                        }
                    });
                    $b8->on('end', function () {
                        $this->b1->bj($this->b5, "socket_end");
                    });
                    $b8->on('close', function () {
                        $this->b1->bj($this->b5, "socket_close");
                    });
                    $b8->on('error', function (\Exception $e) {
                        $this->b1->bj($this->b5, "socket_error");
                    });
                },
                function (\Exception $exception) {
                    $this->b6->bk("Failed to connect to: " . $this->b1->bl()->bm() . ", message: " . $exception->getMessage());
                    $this->b4->bj($this->b1->bn(), a2::bo);
                }
            );
    }
    public function bp($a6)
    {
        if (isset($this->b8)) {
            $this->b8->write($a6);
        } else {
            array_push($this->b9, $a6);
        }
    }
    public function bq()
    {
        if (isset($this->b8)) {
            $this->b8->close();
            $this->b8 = null;
        }
    }
}
class br implements MigratoryDataLogListener
{
    function onLog($log, $migratoryDataLogLevel)
    {
        if ($migratoryDataLogLevel === MigratoryDataLogLevel::TRACE) {
            $bs = "TRACE";
        } else if ($migratoryDataLogLevel === MigratoryDataLogLevel::DEBUG) {
            $bs = "DEBUG";
        } else if ($migratoryDataLogLevel === MigratoryDataLogLevel::INFO) {
            $bs = "INFO";
        } else if ($migratoryDataLogLevel === MigratoryDataLogLevel::WARN) {
            $bs = "WARN";
        } else if ($migratoryDataLogLevel === MigratoryDataLogLevel::ERROR) {
            $bs = "ERROR";
        }
        $bt = date('Y-m-d H:i:s');
        echo "[" . $bt . "] [" . $bs . "] " . $log . PHP_EOL;
    }
}
interface bu
{
    function bv($bw);
    function bx($bw);
    function bk($bw);
    function by($bw);
    function bz($bw);
}
class c0 implements bu
{
    private $c1;
    private $c2 = MigratoryDataLogLevel::INFO;
    public function __construct()
    {
        $this->c1 = new br();
    }
    public function c3($c1, $c2)
    {
        $this->c1 = $c1;
        $this->c2 = $c2;
    }
    function bv($bw)
    {
        if ($this->c2 <= MigratoryDataLogLevel::TRACE) {
            $this->c1->onLog($bw, MigratoryDataLogLevel::TRACE);
        }
    }
    function bx($bw)
    {
        if ($this->c2 <= MigratoryDataLogLevel::DEBUG) {
            $this->c1->onLog($bw, MigratoryDataLogLevel::DEBUG);
        }
    }
    function bk($bw)
    {
        if ($this->c2 <= MigratoryDataLogLevel::INFO) {
            $this->c1->onLog($bw, MigratoryDataLogLevel::INFO);
        }
    }
    function by($bw)
    {
        if ($this->c2 <= MigratoryDataLogLevel::WARN) {
            $this->c1->onLog($bw, MigratoryDataLogLevel::WARN);
        }
    }
    function bz($bw)
    {
        if ($this->c2 <= MigratoryDataLogLevel::ERROR) {
            $this->c1->onLog($bw, MigratoryDataLogLevel::ERROR);
        }
    }
}
class c4
{
    const c5 = "[READ_EVENT] ";
    const c6 = "[PING_EVENT] ";
    const c7 = "[CONNECT_EVENT] ";
    const c8 = "[DISCONNECT_EVENT] ";
    const c9 = "[READER_DISCONNECT_EVENT] ";
    const ca = "[MESSAGE_RECEIVED_EVENT] ";
    const cb = "[WRITE_EVENT] ";
    const cc = "[CLIENT_PUBLISH_RESPONSE] ";
    const cd = "[ENTITLEMENT_CHECK_RESPONSE] ";
    const ce = "[DISPOSE_EVENT] ";
    const cf = "[PAUSE_EVENT] ";
    const cg = "[RESUME_EVENT] ";
    const ch = "[SUBSCRIBE_EVENT] ";
    const ci = "[UNSUBSCRIBE_EVENT] ";
    const cj = "[PUBLISH_EVENT] ";
    const ck = "[REPUBLISH_EVENT] ";
    const cl = "[PING_SERVER_EVENT] ";
    const cm = "[CONNECT_SERVER_EVENT] ";
    const cn = "[RECONNECT_EVENT] ";
}
class co
{
    private $cp = 2;
    private $e;
    private $cq;
    private $g;
    private $x = 0;
    private $cr = 70000;
    private $cs = false;
    private $ct = 0;
    private $cu = 0;
    private $cv = a2::cw;
    private $cx = cy::cz;
    public function __construct($e, $cq, $g)
    {
        $this->e = $e;
        $this->cq = ($cq / 100) * 100;
        $this->g = $g;
    }
    public function d0()
    {
        return $this->x;
    }
    public function d1($x)
    {
        $this->x = $x;
        $this->cu++;
    }
    public function d2()
    {
        return $this->cr;
    }
    public function d3($cr)
    {
        $this->cr = $cr;
    }
    public function h()
    {
        return $this->e;
    }
    public function d4()
    {
        return $this->cq;
    }
    public function d5()
    {
        return $this->cq >= 100;
    }
    public function j()
    {
        return $this->g;
    }
    public function d6()
    {
        $this->cu = 0;
        if ($this->d7()) {
            $this->ct++;
        }
    }
    public function d8()
    {
        $this->ct = 0;
    }
    public function cu()
    {
        return $this->cu;
    }
    public function d9($da)
    {
        $this->cv = $da;
    }
    public function db()
    {
        return $this->cv;
    }
    public function d7()
    {
        return $this->cr != 70000;
    }
    public function dc()
    {
        $dd = cy::cz;
        if ($this->d5()) {
            $dd = cy::de;
        } else {
            if ($this->d7()) {
                if ($this->ct >= $this->cp) {
                    if ($this->g > 0) {
                        $dd = cy::df;
                    }
                } else {
                    $dd = cy::dg;
                }
            } else {
                if ($this->g > 0) {
                    $dd = cy::df;
                }
            }
        }
        if ($dd == cy::cz || $dd == cy::df || $dd == cy::de) {
            $this->d9(a2::cw);
            $this->d8();
        }
        $this->cx = $dd;
        return $dd;
    }
    public function cx()
    {
        return $this->cx;
    }
    public function dh()
    {
        $this->cx = cy::cz;
    }
    public function __toString()
    {
        return "[Subj=" .
            $this->e .
            ", Conflation=" . $this->cq .
            ", Seq=" . $this->x .
            ", SeqId=" . $this->cr .
            ", NeedRecovery=" . a2::a4($this->cs) .
            ", MessagesReceivedUntilRecovery=" . $this->cu .
            ", CacheRecoveryStatus=" . $this->cv .
            ", SubscribeType=" . $this->cx .
            ", NrOfConsecutiveRecovery=" . $this->ct .
            "]";
    }
}
class cy
{
    const cz = 0;
    const de = 1;
    const df = 2;
    const dg = 3;
}
class di
{
    private $dj;
    private $dk;
    public function __construct($dj, $dk)
    {
        $this->dj = $dj;
        $this->dk = $dk;
    }
    public function dl()
    {
        return $this->dj;
    }
    public function dm()
    {
        return $this->dk;
    }
    public function __toString()
    {
        $dn = "";
        if (isset($this->dk) && isset($this->dj)) {
            $dn .= "OPERATION " . $this->dp($this->dj);
            $dn .= " Headers ";
            $dq = array_keys($this->dk);
            foreach ($dq as $dr) {
                $ds = $this->dt($dr);
                if (is_array($this->dk[$dr])) {
                    $dn .= $ds . ": " . a2::a3($this->dk[$dr]) . " - ";
                } else {
                    $dn .= $ds . ": " . $this->dk[$dr] . " - ";
                }
            }
        }
        return $dn;
    }
    private function dp($du)
    {
        switch ($du) {
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
    private function dt($du)
    {
        switch ($du) {
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
                return "ACK_UNSUBSCRIBE";
            case 18:
                return "ACK_PUBLISH";
            case 19:
                return "AGENT_NAME";
            case 20:
                return "AGENT_TYPE";
            case 21:
                return "MESSAGE_TYPE";
            case 22:
                return "USER_AGENT";
            case 23:
                return "SESSION_TYPE";
            case 24:
                return "SERVER_CLIENT_PING_TIME";
            case 25:
                return "CLOSURE";
            case 26:
                return "GUARANTEED_DELIVERY";
            case 27:
                return "HISTORICAL_MESSAGES";
            case 28:
                return "REPLY_SUBJECT";
            case 29:
                return "VERSION";
            case 30:
                return "CLUSTER_TOKEN";
        }
        return "";
    }
}
class dv
{
    public static $dw = array();
    public static $dx = array();
    public static $dy = array();
    public static $dz = array();
    public static $e0 = array();
    public static $dk = array();
    public static $e1 = array();
    const e2 = 0x19;
    const e3 = 0x7F;
    const e4 = 0x1E;
    const e5 = 0x1F;
    public static function e6()
    {
        self::$dw = array_fill(0, 128, -1);
        self::$dw[e7::e8] = 0x01;
        self::$dw[e7::e9] = 0x02;
        self::$dw[e7::ea] = 0x03;
        self::$dw[e7::eb] = 0x04;
        self::$dw[e7::ec] = 0x05;
        self::$dw[e7::ed] = 0x06;
        self::$dw[e7::ee] = 0x07;
        self::$dw[e7::ef] = 0x08;
        self::$dw[e7::eg] = 0x09;
        self::$dw[e7::eh] = 0x0B;
        self::$dw[e7::ei] = 0x0C;
        self::$dw[e7::ej] = 0x0E;
        self::$dw[e7::ek] = 0x0F;
        self::$dw[e7::el] = 0x10;
        self::$dw[e7::em] = 0x11;
        self::$dw[e7::en] = 0x12;
        self::$dw[e7::cc] = 0x13;
        self::$dw[e7::eo] = 0x14;
        self::$dx = array_fill(0, 128, -1);
        self::$dx[ep::eq] = 0x01;
        self::$dx[ep::er] = 0x02;
        self::$dx[ep::es] = 0x03;
        self::$dx[ep::et] = 0x04;
        self::$dx[ep::eu] = 0x05;
        self::$dx[ep::ev] = 0x06;
        self::$dx[ep::ew] = 0x07;
        self::$dx[ep::ex] = 0x08;
        self::$dx[ep::ey] = 0x09;
        self::$dx[ep::ez] = 0x0B;
        self::$dx[ep::f0] = 0x0C;
        self::$dx[ep::f1] = 0x0F;
        self::$dx[ep::f2] = 0x12;
        self::$dx[ep::f3] = 0x13;
        self::$dx[ep::f4] = 0x14;
        self::$dx[ep::f5] = 0x15;
        self::$dx[ep::f6] = 0x16;
        self::$dx[ep::f7] = 0x17;
        self::$dx[ep::f8] = 0x18;
        self::$dx[ep::f9] = 0x1A;
        self::$dx[ep::fa] = 0x1B;
        self::$dx[ep::fb] = 0x1C;
        self::$dx[ep::fc] = 0x1D;
        self::$dx[ep::fd] = 0x26;
        self::$dx[ep::fe] = 0x27;
        self::$dx[ep::ff] = 0x23;
        self::$dx[ep::fg] = 0x24;
        self::$dx[ep::fh] = 0x25;
        self::$dx[ep::fi] = 0x10;
        self::$dx[ep::fj] = 0x11;
        self::$dx[ep::fk] = 0x28;
        self::$dx[ep::fl] = 0x2C;
        self::$dx[ep::fm] = 0x2D;
        self::$dx[ep::fn] = 0x2E;
        self::$dx[ep::fo] = 0x2F;
        self::$dx[ep::fp] = 0x30;
        self::$e0 = array_fill(0, 128, -1);
        self::fq(ep::eq, fr::fs);
        self::fq(ep::er, fr::ft);
        self::fq(ep::es, fr::fu);
        self::fq(ep::et, fr::fu);
        self::fq(ep::eu, fr::fu);
        self::fq(ep::ev, fr::fu);
        self::fq(ep::ew, fr::ft);
        self::fq(ep::ex, fr::ft);
        self::fq(ep::ey, fr::ft);
        self::fq(ep::ez, fr::fu);
        self::fq(ep::f0, fr::ft);
        self::fq(ep::f1, fr::fu);
        self::fq(ep::f2, fr::fs);
        self::fq(ep::f3, fr::fs);
        self::fq(ep::f4, fr::fs);
        self::fq(ep::f5, fr::fu);
        self::fq(ep::f6, fr::fu);
        self::fq(ep::f7, fr::fu);
        self::fq(ep::f8, fr::fu);
        self::fq(ep::f9, fr::fs);
        self::fq(ep::fa, fr::fs);
        self::fq(ep::fb, fr::fs);
        self::fq(ep::fc, fr::fu);
        self::fq(ep::fd, fr::fs);
        self::fq(ep::fe, fr::fs);
        self::fq(ep::ff, fr::fs);
        self::fq(ep::fg, fr::fu);
        self::fq(ep::fh, fr::fu);
        self::fq(ep::fi, fr::fs);
        self::fq(ep::fj, fr::fu);
        self::fq(ep::fk, fr::fu);
        self::fq(ep::fl, fr::fs);
        self::fq(ep::fm, fr::fu);
        self::fq(ep::fn, fr::fu);
        self::fq(ep::fo, fr::fu);
        self::fq(ep::fp, fr::fs);
        self::$dz = array_fill(0, 255, -1);
        self::$dz[self::e3] = 0x01;
        self::$dz[self::e4] = 0x02;
        self::$dz[self::e5] = 0x03;
        self::$dz[fv::fw] = 0x04;
        self::$dz[fv::fx] = 0x05;
        self::$dz[fv::fy] = 0x06;
        self::$dz[fv::fz] = 0x07;
        self::$dz[fv::g0] = 0x08;
        self::$dz[33] = 0x09;
        self::$dz[self::e2] = 0x0B;
        self::$dy = array_fill(0, 255, -1);
        for ($i = 0; $i <= 128; $i++) {
            $e = self::g1($i);
            if ($e != -1) {
                self::$dy[$e] = $i;
            }
        }
        self::$dk = array_fill(0, 128, -1);
        for ($g2 = 0; $g2 <= ep::fo; $g2++) {
            self::$dk[self::g3($g2)] = $g2;
        }
        self::$e1 = array_fill(0, 128, -1);
        for ($g2 = 0; $g2 <= e7::eo; $g2++) {
            self::$e1[self::g4($g2)] = $g2;
        }
    }
    public static function g5($a6)
    {
        $g6 = array_merge(unpack('C*', $a6));
        $g7 = 0;
        for ($g2 = 0; $g2 < count($g6); $g2++) {
            $g8 = self::g1($g6[$g2]);
            if ($g8 != -1) {
                $g7++;
            }
        }
        if ($g7 == 0) {
            return call_user_func_array("pack", array_merge(array("C*"), $g6));
        }
        $g9 = array_fill(0, count($g6) + $g7, 0);
        for ($g2 = 0, $ga = 0; $g2 < count($g6); $g2++, $ga++) {
            $g8 = self::g1($g6[$g2]);
            if ($g8 != -1) {
                $g9[$ga] = self::e5;
                $g9[$ga + 1] = $g8;
                $ga++;
            } else {
                $g9[$ga] = $g6[$g2];
            }
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g9));
    }
    public static function gb($a6)
    {
        $g6 = array_merge(unpack('C*', $a6));
        $g7 = 0;
        if (count($g6) == 0) {
            return $a6;
        }
        for ($g2 = 0; $g2 < count($g6); $g2++) {
            if ($g6[$g2] == self::e5) {
                $g7++;
            }
        }
        $g9 = array_fill(0, count($g6) - $g7, 0);
        for ($g2 = 0, $ga = 0; $g2 < count($g6); $g2++, $ga++) {
            $gc = $g6[$g2];
            if ($gc == self::e5) {
                if ($g2 + 1 < count($g6)) {
                    $g9[$ga] = self::gd($g6[$g2 + 1]);
                    if ($g9[$ga] == -1) {
                        throw new \InvalidArgumentException();
                    }
                    $g2++;
                } else {
                    throw new \InvalidArgumentException();
                }
            } else {
                $g9[$ga] = $gc;
            }
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g9));
    }
    public static function ge($a6, $gf, $gg)
    {
        $gh = null;
        $gi = strpos($a6, chr(self::g3($gf)));
        $gj = strpos($a6, chr(self::e4), $gi);
        if ($gi !== false && $gj !== false) {
            $gk = substr($a6, $gi + 1, $gj - ($gi + 1));
            switch ($gg) {
                case fr::gl:
                    $gh = $gk;
                    break;
                case fr::ft:
                    $gh = $gk;
                    break;
                case fr::fs:
                    $gh = $gk;
                    break;
                case fr::fu:
                    $gh = self::gm($gk);
                    break;
            }
        }
        return $gh;
    }
    public static function gm($gn)
    {
        $a6 = array_merge(unpack("C*", $gn));
        $g9 = 0;
        $go = -1;
        $gp = 0;
        $gq;
        $gc;
        $gr = count($a6);
        $aj = 0;
        if ($gr == 1) {
            return $a6[0];
        } else if ($gr == 2 && $a6[$aj] == self::e5) {
            $gc = self::gd($a6[$aj + 1]);
            if ($gc != -1) {
                return $gc;
            } else {
                throw new \InvalidArgumentException();
            }
        }
        for (; $gr > 0; $gr--) {
            $gc = $a6[$aj];
            $aj++;
            if ($gc == self::e5) {
                if ($gr - 1 < 0) {
                    throw new \InvalidArgumentException();
                }
                $gr--;
                $gc = $a6[$aj];
                $aj++;
                $gq = self::gd($gc);
                if ($gq == -1) {
                    throw new \InvalidArgumentException();
                }
            } else {
                $gq = $gc;
            }
            if ($go > 0) {
                $gp |= $gq >> $go;
                $g9 = $g9 << 8 | ($gp >= 0 ? $gp : $gp + 256);
                $gp = ($gq << (8 - $go));
            } else {
                $gp = ($gq << -$go);
            }
            $go = ($go + 7) % 8;
        }
        return $g9;
    }
    public static function gs($gp)
    {
        if (($gp & 0xFFFFFF80) == 0) {
            $i = self::g1($gp);
            if ($i == -1) {
                return pack('C*', $gp);
            } else {
                return pack('C*', self::e5, $i);
            }
        }
        $gt = 0;
        if (($gp & 0xFF000000) != 0) {
            $gt = 24;
        } else if (($gp & 0x00FF0000) != 0) {
            $gt = 16;
        } else {
            $gt = 8;
        }
        $g9 = array_fill(0, 10, 0);
        $gu = 0;
        $gv = 0;
        while ($gt >= 0) {
            $b = (($gp >> $gt) & 0xFF);
            $gv++;
            $g9[$gu] |= ($b >= 0 ? $b : $b + 256) >> $gv;
            $g8 = self::g1($g9[$gu]);
            if ($g8 != -1) {
                $g9[$gu] = self::e5;
                $g9[$gu + 1] = $g8;
                $gu++;
            }
            $gu++;
            $g9[$gu] |= ($b << (7 - $gv)) & 0x7F;
            $gt -= 8;
        }
        $g8 = self::g1($g9[$gu]);
        if ($g8 != -1) {
            $g9[$gu] = self::e5;
            $g9[$gu + 1] = $g8;
            $gu++;
        }
        $gu++;
        if ($gu < count($g9)) {
            $g9 = array_slice($g9, 0, $gu);
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g9));
    }
    public static function gd($b)
    {
        return $b >= 0 ? self::$dy[$b] : -1;
    }
    public static function g1($b)
    {
        return $b >= 0 ? self::$dz[$b] : -1;
    }
    public static function g3($h)
    {
        return self::$dx[$h];
    }
    public static function gw($gc)
    {
        return self::$dk[$gc];
    }
    public static function g4($o)
    {
        return self::$dw[$o];
    }
    public static function dl($gc)
    {
        return self::$e1[$gc];
    }
    public static function gx()
    {
        return self::e2;
    }
    public static function fq($gy, $gz)
    {
        self::$e0[dv::g3($gy)] = $gz;
    }
    public static function h0($gy)
    {
        $h1 = self::g3($gy);
        return self::$e0[$h1];
    }
}
class e7
{
    const e8 = 0;
    const e9 = 1;
    const ea = 2;
    const eb = 3;
    const ec = 4;
    const ed = 5;
    const ee = 6;
    const ef = 7;
    const en = 8;
    const eg = 9;
    const eh = 10;
    const ei = 11;
    const ej = 12;
    const ek = 13;
    const em = 14;
    const el = 15;
    const cc = 16;
    const eo = 17;
}
class ep
{
    const eq = 0;
    const er = 1;
    const es = 2;
    const et = 3;
    const eu = 4;
    const ev = 5;
    const ew = 6;
    const ex = 7;
    const ey = 8;
    const ez = 9;
    const f0 = 10;
    const f1 = 11;
    const f2 = 12;
    const f3 = 13;
    const f4 = 14;
    const f5 = 15;
    const f6 = 16;
    const f7 = 17;
    const f8 = 18;
    const f9 = 19;
    const fa = 20;
    const fb = 21;
    const fc = 22;
    const fd = 23;
    const fe = 24;
    const ff = 25;
    const fg = 26;
    const fh = 27;
    const fi = 28;
    const fj = 29;
    const fk = 30;
    const fl = 31;
    const fm = 32;
    //TODO
    const fn = 33;
    //TODO
    const fp = 34;
    const fo = 35;
}
class fr
{
    const gl = 0;
    const ft = 1;
    const fs = 2;
    const fu = 3;
}
class h2
{
    const h3 = "1";
    const h4 = "2";
    const h5 = "3";
}
class fv
{
    const fw = 0x00;
    const fz = 0x22;
    const fx = 0x0A;
    const fy = 0x0D;
    const g0 = 0x5C;
}
class h6
{
    const h7 = 4;
    const h8 = 8;
}
class h9
{
    const ha = "d";
    const hb = "a";
}
class hc
{
    const hd = 0;
    const he = 1;
    const hf = 2;
}
dv::e6();
class hg implements m
{
	private $hh = "POST / HTTP/1.1";
	private $hi = "Host: ";
	private $hj = "Content-Length: ";
	private $hk = "00000";
	private $hl = "\r\n";
	public function __construct()
	{
	}
	public function n($o)
	{
		$q = new a5();
		$q->ae($this->hh);
		$q->ae($this->hl);
		$q->ae($this->hi);
		$q->ae(dv::g5($o));
		$q->ae($this->hl);
		$q->ae($this->hj);
		$q->al();
		$q->ae($this->hk);
		$q->ae($this->hl);
		$q->ae($this->hl);
		$q->am();
		return $q;
	}
	public function p($q)
	{
		$aj = $q->ax();
		$hm = strval($aj - $q->aq());
		if (strlen($hm) <= strlen($this->hk)) {
			$b7 = 0;
			for ($g2 = strlen($this->hk) - strlen($hm); $g2 < strlen($this->hk); $g2++) {
				$q->ai($q->ap() + $g2, $hm[$b7]);
				$b7++;
			}
		} else {
			$hn = substr($q->av(), 0, $q->ap());
			$hn .= $hm;
			$hn .= substr($q->av(), $q->ap() + strlen($this->hk));
			$q->au($hn);
		}
	}
	public function r($o, $s)
	{
		return "";
	}
}
class ho implements m
{
	private $hp = "GET /WebSocketConnection HTTP/1.1";
	private $hq = "GET /WebSocketConnection-Secure HTTP/1.1";
	private $hi = "Host: ";
	private $hr = "Origin: ";
	private $hs = "Upgrade: websocket";
	private $ht = "Sec-WebSocket-Key: 23eds34dfvce4";
	private $hu = "Sec-WebSocket-Version: 13";
	private $hv = "Sec-WebSocket-Protocol: pushv1";
	private $hw = "Connection: Upgrade";
	private $hl = "\r\n";
	private $hx = 10;
	private $hy = -128;
	private $hz = -128;
	private $i0 = 0x02;
	public function __construct()
	{
	}
	public function n($o)
	{
		$q = new a5();
		for ($g2 = 0; $g2 < $this->hx; $g2++) {
			$q->ae(chr(0x00));
		}
		for ($g2 = 0; $g2 < 4; $g2++) {
			$i1 = chr(rand(0, 100));
			$q->ae($i1);
			$q->af($i1);
		}
		$q->an();
		return $q;
	}
	public function p($q)
	{
		$i2 = chr($this->hy) | chr($this->i0);
		$q->ao();
		$i3 = $q->at() - $q->ar();
		$i4 = $this->i5($i3);
		$i6 = $this->i7($i3, $i4);
		$i8 = 0;
		if ($i4 === 1) {
			$i8 = 8;
			$q->ai($i8, $i2);
			$q->ai($i8 + 1, $i6[0] | chr($this->hz));
		} else if ($i4 === 2) {
			$i8 = 6;
			$q->ai($i8, $i2);
			$q->ai($i8 + 1, chr(126) | chr($this->hz));
			for ($g2 = 0; $g2 <= 1; $g2++) {
				$q->ai($i8 + 2 + $g2, $i6[$g2]);
			}
		} else {
			$q->ai($i8, $i2);
			$q->ai($i8 + 1, chr(127) | chr($this->hz));
			for ($g2 = 0; $g2 <= 7; $g2++) {
				$q->ai($i8 + 2 + $g2, $i6[$g2]);
			}
		}
		$q->ab($i8);
	}
	public function r($o, $s)
	{
		$q = new a5();
		if (!$s) {
			$q->ae($this->hp);
		} else {
			$q->ae($this->hq);
		}
		$q->ae($this->hl);
		$q->ae($this->hr);
		$q->ae("http://" . $o);
		$q->ae($this->hl);
		$q->ae($this->hi);
		$q->ae($o);
		$q->ae($this->hl);
		$q->ae($this->hs);
		$q->ae($this->hl);
		$q->ae($this->hw);
		$q->ae($this->hl);
		$q->ae($this->ht);
		$q->ae($this->hl);
		$q->ae($this->hu);
		$q->ae($this->hl);
		$q->ae($this->hv);
		$q->ae($this->hl);
		$q->ae($this->hl);
		return $q;
	}
	private function i5($i9)
	{
		if ($i9 <= 125) {
			return 1;
		} else if ($i9 <= 65535) {
			return 2;
		}
		return 8;
	}
	private function i7($b, $i4)
	{
		$q = "";
		$ia = 8 * $i4 - 8;
		for ($g2 = 0; $g2 < $i4; $g2++) {
			$ib = $this->ic($b, $ia - 8 * $g2);
			$id = $ib - (256 * intval($ib / 256));
			$q .= chr($id);
		}
		return $q;
	}
	private function ic($gp, $ie)
	{
		return ($gp % 0x100000000) >> $ie;
	}
}
class ig
{
    private $eu = h6::h8;
    private $ih = MigratoryDataClient::TRANSPORT_WEBSOCKET;
    public function __construct()
    {
    }
    public function ii()
    {
        $this->ih = MigratoryDataClient::TRANSPORT_HTTP;
        $this->eu = h6::h7;
    }
    public function ij($q, $e, $ik, $il, $im, $in, $io, $ip)
    {
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $q->ae(chr(dv::g4(e7::e8)));
        } else {
            $q->ae(chr(dv::g4(e7::e8)) ^ $q->ag());
        }
        if (isset($il)) {
            $q->ae($this->iq(dv::g3(ep::f3), dv::g5($il), $q));
        }
        if (isset($im)) {
            $q->ae($this->iq(dv::g3(ep::fg), dv::gs($im), $q));
        }
        if (isset($in)) {
            $q->ae($this->iq(dv::g3(ep::ff), dv::g5($in), $q));
        }
        $q->ae($this->iq(dv::g3(ep::eq), dv::g5($e->h()), $q));
        if (isset($ik) && $ik >= 0) {
            $q->ae($this->iq(dv::g3(ep::ev), dv::gs($ik), $q));
        }
        $ir = $e->dc();
        switch ($ir) {
            case cy::cz:
                break;
            case cy::de:
                $q->ae($this->iq(dv::g3(ep::fc), dv::gs($e->d4()), $q));
                break;
            case cy::df:
                $q->ae($this->iq(dv::g3(ep::fk), dv::gs($e->j()), $q));
                break;
            case cy::dg:
                $q->ae($this->iq(dv::g3(ep::et), dv::gs($e->d2()), $q));
                $q->ae($this->iq(dv::g3(ep::es), dv::gs($e->d0() + 1), $q));
                break;
        }
        if (isset($ip)) {
            $q->ae($this->iq(dv::g3(ep::fn), dv::gs(1), $q));
        }
        $q->ae($this->iq(dv::g3(ep::eu), dv::gs($this->eu), $q));
        $q->ae($this->iq(dv::g3(ep::fm), dv::gs($io), $q));
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $q->ae(chr(dv::e3));
        } else {
            $q->ae(chr(dv::e3) ^ $q->ag());
        }
    }
    public function is($q, $ik, $e)
    {
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $q->ae(chr(dv::g4(e7::e9)));
        } else {
            $q->ae(chr(dv::g4(e7::e9)) ^ $q->ag());
        }
        $q->ae($this->iq(dv::g3(ep::eq), dv::g5($e->h()), $q));
        if ($ik > 0) {
            $q->ae($this->iq(dv::g3(ep::ev), dv::gs($ik), $q));
        }
        if ($e->d5()) {
            $q->ae($this->iq(dv::g3(ep::fc), dv::gs($e->d4()), $q));
        }
        $q->ae($this->iq(dv::g3(ep::eu), dv::gs($this->eu), $q));
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $q->ae(chr(dv::e3));
        } else {
            $q->ae(chr(dv::e3) ^ $q->ag());
        }
    }
    public function it($q, $ik)
    {
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $q->ae(chr(dv::g4(e7::e9)));
        } else {
            $q->ae(chr(dv::g4(e7::e9)) ^ $q->ag());
        }
        if ($ik > 0) {
            $q->ae($this->iq(dv::g3(ep::ev), dv::gs($ik), $q));
        }
        $q->ae($this->iq(dv::g3(ep::eu), dv::gs($this->eu), $q));
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $q->ae(chr(dv::e3));
        } else {
            $q->ae(chr(dv::e3) ^ $q->ag());
        }
    }
    public function iu($q, $bw, $iv)
    {
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $q->ae(chr(dv::g4(e7::el)));
        } else {
            $q->ae(chr(dv::g4(e7::el)) ^ $q->ag());
        }
        $q->ae($this->iq(dv::g3(ep::eq), dv::g5($bw->getSubject()), $q));
        $q->ae($this->iq(dv::g3(ep::er), dv::g5($bw->getContent()), $q));
        $v = $bw->getReplySubject();
        if (strlen($v) > 0) {
            $q->ae($this->iq(dv::g3(ep::fl), dv::g5($v), $q));
        }
        if (count($bw->getFields()) > 0) {
            $w = $bw->getFields();
            foreach ($w as $iw) {
                $ix = $iw->getName();
                $iy = $iw->getValue();
                if (isset($ix) && strlen($ix) > 0 && isset($iy) && strlen($iy) > 0) {
                    $q->ae($this->iq(dv::g3(ep::fa), dv::g5($ix), $q));
                    $q->ae($this->iq(dv::g3(ep::fb), dv::g5($iy), $q));
                }
            }
        }
        $u = $bw->getClosure();
        if (strlen($u) > 0) {
            $q->ae($this->iq(dv::g3(ep::fi), dv::g5($u), $q));
        }
        $q->ae($this->iq(dv::g3(ep::ev), dv::gs($iv), $q));
        $q->ae($this->iq(dv::g3(ep::eu), dv::gs($this->eu), $q));
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $q->ae(chr(dv::e3));
        } else {
            $q->ae(chr(dv::e3) ^ $q->ag());
        }
    }
    public function iz($q, $e, $x, $y, $ik)
    {
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $q->ae(chr(dv::g4(e7::e9)));
        } else {
            $q->ae(chr(dv::g4(e7::e9)) ^ $q->ag());
        }
        $q->ae($this->iq(dv::g3(ep::eq), dv::g5($e), $q));
        $q->ae($this->iq(dv::g3(ep::es), dv::gs($x), $q));
        $q->ae($this->iq(dv::g3(ep::et), dv::gs($y), $q));
        if ($ik > 0) {
            $q->ae($this->iq(dv::g3(ep::ev), dv::gs($ik), $q));
        }
        $q->ae($this->iq(dv::g3(ep::eu), dv::gs($this->eu), $q));
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $q->ae(chr(dv::e3));
        } else {
            $q->ae(chr(dv::e3) ^ $q->ag());
        }
    }
    private function iq($gh, $a6, $q)
    {
        $g9 = '';
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $g9 .= chr($gh);
            $g9 .= $a6;
            $g9 .= chr(dv::e4);
        } else {
            $g9 .= chr($gh) ^ $q->ag();
            for ($g2 = 0; $g2 < strlen($a6); $g2++) {
                $g9 .= $a6[$g2] ^ $q->ag();
            }
            $g9 .= chr(dv::e4) ^ $q->ag();
        }
        return $g9;
    }
}
class j0
{
    const j1 = 80;
    const j2 = 443;
    const j3 = 100;
    private $o;
    private $b2;
    private $j4;
    private $j5 = self::j3;
    public function __construct($j6, $j7)
    {
        $this->j4 = $j6;
        $j8 = explode(" ", $j6, 2);
        if (count($j8) == 2) {
            $j5 = intval($j8[0]);
            if ($j5 <= 0 || $j5 > 100) {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "the weight of a cluster member must be between 0 and 100, weight: " . $j5);
            }
            $this->j5 = intval($j8[0]);
            $j6 = $j8[1];
        }
        $j9 = strrpos($j6, '/');
        $ja = $j9 === false ? $j6 : substr($j6, $j9 + 1);
        $jb = strrpos($ja, ':');
        if ($jb !== false) {
            $this->o = substr($ja, 0, $jb);
            $this->b2 = intval(substr($ja, $jb + 1));
            if ($this->b2 < 0 || $this->b2 > 65535) {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $j6 . " - invalid port number");
            }
            if ($this->o === "") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "Cluster member with null address");
            }
            if ($this->o === "*") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $j6 . " - wildcard address (*) cannot be used to define a cluster member");
            }
        } else {
            $this->o = $ja;
            if ($this->o === "") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "Cluster member with null address");
            }
            if ($this->o === "*") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $j6 . " - wildcard address (*) cannot be used to define a cluster member");
            }
            if ($j7 === false) {
                $this->b2 = self::j1;
            } else {
                $this->b2 = self::j2;
            }
        }
    }
    public function jc()
    {
        return $this->o;
    }
    public function jd()
    {
        return $this->b2;
    }
    public function je()
    {
        return $this->j4;
    }
    public function jf()
    {
        return $this->j5;
    }
    public function jg($jh)
    {
        if ($this->jc() === $jh->jc()) {
            if ($this->jd() === $jh->jd()) {
                return true;
            }
        }
        return false;
    }
    public function __toString()
    {
        return "[Host=" .
            $this->o .
            ", Port=" .
            $this->b2 .
            "]";
    }
}
class ji
{
    private $jj = array();
    private $jk = array();
    private $jl = null;
    public function __construct($jm, $j7)
    {
        foreach ($jm as $jn) {
            $this->jj[] = new j0($jn, $j7);
        }
    }
    public function jo()
    {
        $jp = $this->jq();
        if (count($jp) === 0) {
            $this->jk = array();
            $jp = $this->jj;
        }
        $jr = $this->js($jp);
        $this->jl = $jp[$jr];
        return $this->jl;
    }
    public function jt($jh)
    {
        array_push($this->jk, $jh);
    }
    public function bm()
    {
        return $this->jl;
    }
    private function jq()
    {
        $jp = array();
        foreach ($this->jj as $jh) {
            $ju = true;
            foreach ($this->jk as $jv) {
                if ($jh->jg($jv)) {
                    $ju = false;
                }
            }
            if ($ju) {
                array_push($jp, $jh);
            }
        }
        return $jp;
    }
    private function js($jp)
    {
        $jr = -1;
        $jw = 0;
        foreach ($jp as $jh) {
            $jw = $jw + $jh->jf();
        }
        if ($jw === 0) {
            $jr = floor(count($jp) * (mt_rand() / mt_getrandmax()));
        } else {
            $j5 = floor($jw * (mt_rand() / mt_getrandmax()));
            $jw = 0;
            $g2 = 0;
            foreach ($jp as $jh) {
                $jw = $jw + $jh->jf();
                if ($jw > $j5) {
                    $jr = $g2;
                    break;
                }
                $g2++;
            }
        }
        return $jr;
    }
}
class jx extends MigratoryDataMessage
{
    public function __construct($e, $t, $u, $v,
                                $w, $a1, $z, $a0)
    {
        parent::__construct($e, $t, $u, $w, $v);
        $this->a1 = $a1;
        $this->z = $z;
        $this->a0 = $a0;
    }
    public function d1($x)
    {
        $this->x = $x;
    }
    public function d0()
    {
        return $this->x;
    }
    public function jy($y)
    {
        $this->y = $y;
    }
    public function jz()
    {
        return $this->y;
    }
}
class a2
{
    const k0 = "NOT_SUBSCRIBED";
    const k1 = "OK";
    const k2 = "FAILED";
    const k3 = "DENY";
    const k4 = "connection_passive_close";
    const k5 = "connection_active_close";
    const bo = "connection_error";
    const cw = "cache_ok";
    const k6 = "cache_ok_no_new_message";
    const k7 = "cache_ok_new_epoch";
    const k8 = "no_cache";
    const k9 = "no_seq";
    const ka = "end";
    const kb = '/^\/([^\/*]+\/)*([^\/*])+$/';
    const kc = "\r\n\r\n";
    const hj = "Content-Length: ";
    public static function kd($gk)
    {
        return preg_match(self::kb, $gk);
    }
    public static function ke($kf)
    {
        $kg = array();
        foreach ($kf as $e) {
            if (isset($e) && a2::kd($e)) {
                array_push($kg, $e);
            }
        }
        return $kg;
    }
    public static function kh($ki, $kj, $kk, $kl, $b6)
    {
        // different epoch, reset and continue.
        if ($ki->d2() !== $kk) {
            $ki->d1($kj);
            $ki->d3($kk);
            return km::kn;
        }
        // if received seq is equal or smaller than the local seq then the message is ignored
        if ($kj <= $ki->d0()) {
            return km::ko;
        }
        // if received seq is +1 than the local seq then the message is processed
        if ($kj === ($ki->d0() + 1)) {
            if ($ki->cx() == cy::dg) {
                $ki->dh();
                $kl->onStatus(MigratoryDataClient::NOTIFY_DATA_SYNC, $ki->h());
                $b6->bx(c4::ca . MigratoryDataClient::NOTIFY_DATA_SYNC . $ki);
            }
            $ki->d1($ki->d0() + 1);
            return km::kn;
        }
        // there is a hole in the order of the messages
        // if there is a missing message when the session is active, then we disconnect the client and make failover.
        if ($ki->cu() > 0) {
            $b6->bx("Missing messages: expected message with sequence number: " . ($ki->d0() + 1) . ", received instead message with sequence number:  " . $kj . " !");
            return km::kp;
        }
        $b6->bx("Reset sequence: '" . ($ki->d0() + 1) . "'. The new sequence is: '" . $kj . "' !");
        $ki->d1($kj);
        $kl->onStatus(MigratoryDataClient::NOTIFY_DATA_RESYNC, $ki->h());
        $b6->bx(c4::ca . MigratoryDataClient::NOTIFY_DATA_RESYNC . " " . $ki);
        return km::kn;
    }
    public static function a3($kq)
    {
        $kr = "";
        if (count($kq) > 0) {
            $kr .= "[";
            for ($g2 = 0; $g2 < count($kq); $g2++) {
                $kr .= $kq[$g2];
                if ($g2 + 1 != count($kq)) {
                    $kr .= ", ";
                }
            }
            $kr .= "]";
        }
        return $kr;
    }
    public static function a4($ks)
    {
        if ($ks) {
            return "true";
        }
        return "false";
    }
}
class kt
{
    private $ku = array();
    private $kv;
    public function __construct()
    {
        $this->kv = new co("", 0, 0);
    }
    public function kw($kf, $cq, $g)
    {
        foreach ($kf as $e) {
            if (!array_key_exists($e, $this->ku)) {
                $ki = new co($e, $cq, $g);
                $this->ku[$e] = $ki;
            }
        }
    }
    public function kx($kf)
    {
        $ky = array();
        foreach ($kf as $e) {
            if (array_key_exists($e, $this->ku)) {
                array_push($ky, $this->ku[$e]);
                unset($this->ku[$e]);
            }
        }
        return $ky;
    }
    public function kz()
    {
        return array_keys($this->ku);
    }
    public function l0($e)
    {
        if (array_key_exists($e, $this->ku)) {
            $l1 = $this->ku[$e];
            if (isset($l1)) {
                return $l1->d5();
            } else {
                return false;
            }
        }
        return false;
    }
    public function h($e)
    {
        if (array_key_exists($e, $this->ku)) {
            return $this->ku[$e];
        }
        return null;
    }
    public function l2($e)
    {
        return array_key_exists($e, $this->ku);
    }
    public function l3()
    {
        return $this->kv;
    }
}
class l4
{
    private $l5;
    private $l6;
    public function __construct($l5, $l6)
    {
        $this->l5 = $l5;
        $this->l6 = $l6;
    }
    public function l7()
    {
        return $this->l5;
    }
    public function l8()
    {
        return $this->l6;
    }
}
class l9
{
    public static function la($q)
    {
        $lb = l9::lc($q, 0);
        $aj = $lb->l7();
        if ($q->ax() < $lb->l8()) {
            $aj = -1;
        }
        if ($aj === -1) {
            return $aj;
        }
        while (ord($q->ak($aj)) === dv::e3) {
            $aj++;
        }
        return $aj;
    }
    public static function lc($q, $ab)
    {
        $ld = new l4(-1, -1);
        if ($ab == $q->ax()) {
            return $ld;
        }
        $aj = $ab;
        $le = 2;
        $lf = 0;
        $lg = 0;
        $lh = $q->ax() - $aj;
        if ($lh < $le) {
            return $ld;
        }
        $gc = dv::gm($q->ak($aj));
        $i2 = ($gc >> 7) & 0x01;
        $li = $gc & 0x40;
        $lj = $gc & 0x20;
        $lk = $gc & 0x10;
        if ($i2 !== 1 || $li != 0 || $lj != 0 || $lk != 0) {
            return $ld;
        }
        $aj++;
        $gc = dv::gm($q->ak($aj));
        $ll = $gc & 0x7F;
        if ($ll < 126) {
            $lg = 0;
            $lf = $ll;
        } else if ($ll === 126) {
            $lg = 2;
            if ($lh < $le + $lg) {
                return $ld;
            }
            $lm = "";
            for ($g2 = $aj + 1; $g2 <= $aj + $lg; $g2++) {
                $lm .= $q->ak($g2);
            }
            $lf = l9::ln($lm);
            $aj += $lg;
        } else {
            $lg = 8;
            if ($lh < $le + $lg) {
                return $ld;
            }
            $lm = "";
            for ($g2 = $aj + 1; $g2 <= $aj + $lg; $g2++) {
                $lm .= $q->ak($g2);
            }
            $lf = l9::ln($lm);
            $aj += $lg;
        }
        if ($lh < ($le + $lg + $lf)) {
            return $ld;
        }
        $aj += 1;
        return new l4($aj, $aj + $lf);
    }
    private static function ln($a6)
    {
        if (strlen($a6) === 2) {
            return (ord($a6[0] & chr(0xFF)) << 8) | ord($a6[1] & chr(0xFF));
        } else {
            $lo = ord($a6[4] & chr(0x7F)) << 24;
            $lp = ord($a6[5] & chr(0xFF)) << 16;
            $lq = ord($a6[6] & chr(0xFF)) << 8;
            $lr = ord($a6[7] & chr(0xFF));
            $ls = $lo | $lp | $lq | $lr;
            return $ls;
        }
    }
}
class lt
{
    public static function lu($q)
    {
        $lv = $q->ah();
        if ($q->ak($lv) == "H") {
            $lv = self::lw($q);
        }
        if ($lv == -1) {
            return array();
        }
        $q->ab($lv);
        $lx = array();
        while (true) {
            if ($lv >= $q->ax()) {
                return $lx;
            }
            if (dv::gm($q->ak($lv)) == dv::gx()) {
                $lv++;
            } else {
                $lb = l9::lc($q, $lv);
                $ly = $lb->l7();
                $lz = $lb->l8();
                if ($ly == -1) {
                    return $lx;
                }
                while (true) {
                    $g2 = self::m0($q, $ly, $lz, chr(dv::e3));
                    if ($g2 == -1) {
                        break;
                    }
                    $dk = self::m1($q, $ly + 1, $g2);
                    if ($dk != null) {
                        $m2 = new di(dv::dl(ord($q->ak($ly))), $dk);
                        array_push($lx, $m2);
                    }
                    $ly = $g2 + 1;
                    $q->ab($ly);
                }
                $lv = $q->ah();
            }
        }
    }
    public static function m3($q)
    {
        $lv = lt::m4($q);
        if ($lv == -1) {
            return array();
        }
        $q->ab($lv);
        $lx = array();
        $aj = $q->ah();
        while (true) {
            $g2 = self::m0($q, $aj, $q->ax(), chr(dv::e3));
            if ($g2 == -1) {
                break;
            }
            $m5 = $q->ak($aj);
            if ($m5 == "H") {
                $m6 = lt::m3($q);
                foreach ($m6 as $m7) {
                    array_push($lx, $m7);
                }
                break;
            }
            $dk = lt::m1($q, $aj + 1, $g2);
            if (isset($dk)) {
                $m2 = new di(dv::dl(ord($q->ak($aj))), $dk);
                array_push($lx, $m2);
            }
            $aj = $g2 + 1;
            $q->ab($aj);
        }
        return $lx;
    }
    public static function m1($q, $l5, $l6)
    {
        $dk = null;
        while (true) {
            if ($l5 >= $l6) {
                break;
            }
            $gy = ord($q->ak($l5));
            $m8 = self::m0($q, $l5 + 1, $l6, chr(dv::e4));
            if ($m8 == -1) {
                return null;
            }
            $gh = dv::gw($gy);
            if ($gh === null) {
                $l5 = $m8 + 1;
                continue;
            }
            $l5++;
            if ($dk == null) {
                $dk = array();
            }
            $b = null;
            $m9 = substr($q->av(), $l5, $m8 - $l5);
            switch (dv::h0($gh)) {
                case fr::fu:
                    $b = dv::gm($m9);
                    break;
                case fr::fs:
                    $b = dv::gb($m9);
                    break;
                case fr::ft:
                    $b = dv::gb($m9);
                    break;
                case fr::gl:
                    $b = $m9;
                    break;
            }
            if (!array_key_exists($gh, $dk)) {
                $dk[$gh] = $b;
            } else {
                $ma = $dk[$gh];
                if (is_array($ma)) {
                    array_push($ma, $b);
                } else {
                    $mb = array();
                    array_push($mb, $ma);
                    array_push($mb, $b);
                    $dk[$gh] = $mb;
                }
            }
            $l5 = $m8 + 1;
        }
        return $dk;
    }
    public static function m4($q)
    {
        $mc = $q->ah();
        $a6 = $q->aw();
        $md = dv::g5(a2::hj);
        $aj = lt::me($md, $a6);
        if ($aj == -1) {
            return -1;
        }
        $aj += strlen($md);
        $mf = "\r";
        $mg = lt::m0($q, $aj, $q->ax(), $mf);
        if ($mg == -1) {
            return -1;
        }
        $mh = substr($a6, $aj, $mg - $aj);
        $mi = intval($mh);
        $aj = lt::me(a2::kc, $a6);
        if ($aj == -1) {
            return $aj;
        }
        $aj += strlen(a2::kc);
        if (($aj + $mi) > strlen($a6)) {
            return -1;
        }
        return $mc + $aj;
    }
    private static function m0($q, $l5, $l6, $mj)
    {
        for ($g2 = $l5; $g2 < $l6; $g2++) {
            $x = $q->ak($g2);
            if ($q->ak($g2) == $mj) {
                return $g2;
            }
        }
        return -1;
    }
    private static function me($mk, $ml)
    {
        $m7 = strlen($mk);
        $ie = strlen($ml);
        $mm = array_fill(0, $m7, 0);
        lt::mn($mk, $m7, $mm);
        $g2 = 0;
        $ga = 0;
        while ($g2 < $ie) {
            if ($mk[$ga] == $ml[$g2]) {
                $ga++;
                $g2++;
            }
            if ($ga == $m7) {
                return $g2 - $ga;
            } else if ($g2 < $ie && $mk[$ga] != $ml[$g2]) {
                if ($ga != 0)
                    $ga = $mm[$ga - 1];
                else
                    $g2 = $g2 + 1;
            }
        }
        return -1;
    }
    private static function mn($mk, $m7, &$mm)
    {
        $gr = 0;
        $mm[0] = 0;
        $g2 = 1;
        while ($g2 < $m7) {
            if ($mk[$g2] == $mk[$gr]) {
                $gr++;
                $mm[$g2] = $gr;
                $g2++;
            } else {
                if ($gr != 0) {
                    $gr = $mm[$gr - 1];
                } else {
                    $mm[$g2] = 0;
                    $g2++;
                }
            }
        }
    }
    private static function lw($q)
    {
        $mo = "\r\n\r\n";
        $aj = $q->ah();
        $g2 = self::me($mo, $q->aw());
        if ($g2 == -1) {
            return -1;
        }
        $aj = $g2 + strlen($mo);
        return $aj;
    }
    public static function mp($dk)
    {
        $mq = array();
        if (!array_key_exists(ep::fa, $dk) ||
            !array_key_exists(ep::fb, $dk)) {
            return $mq;
        }
        $a = $dk[ep::fa];
        $iw = $dk[ep::fb];
        if (is_string($a) && is_string($iw)) {
            array_push($mq, new MigratoryDataField($a, $iw));
        } else if (is_array($a) && is_array($iw)) {
            if (count($a) === count($iw)) {
                for ($g2 = 0; $g2 < count($a); $g2++) {
                    array_push($mq, new MigratoryDataField($a[$g2], $iw[$g2]));
                }
            }
        }
        return $mq;
    }
    public static function mr($dk)
    {
        $ms = array();
        if (!array_key_exists(ep::fa, $dk) ||
            !array_key_exists(ep::fb, $dk)) {
            return $ms;
        }
        $a = $dk[ep::fa];
        $iw = $dk[ep::fb];
        if (is_string($a) && is_string($iw)) {
            $ms[$a] = $iw;
        } else if (is_array($a) && is_array($iw)) {
            if (count($a) === count($iw)) {
                for ($g2 = 0; $g2 < count($a); $g2++) {
                    $ms[$a[$g2]] = $iw[$g2];
                }
            }
        }
        return $ms;
    }
}
class mt
{
    private $b7 = null;
    private $o = null;
    private $mu = null;
    private $b3 = null;
    private $kl = null;
    private $mv = mw::ed;
    private $mx = false;
    private $b4 = null;
    private $my = mz::n0;
    private $n1 = null;
    private $n2 = null;
    private $n3 = null;
    private $ik = -1;
    private $n4 = false;
    private $n5 = 0;
    private $n6 = false;
    private $n7 = 0;
    private $n8 = false;
    private $ip = false;
    private $n9 = true;
    private $na = null;
    private $nb;
    private $b6 = null;
    public function __construct($nc, $mu, $b3, $kl, $b6)
    {
        $this->b7 = $nc;
        $this->mu = $mu;
        $this->b3 = $b3;
        $this->kl = $kl;
        $this->b6 = $b6;
        $this->b4 = new nd($this->b7, $this);
        $this->nb = new kt();
        $this->n2 = new ig();
        if ($nc->ne() === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            $this->n1 = new ho();
        } else {
            $this->n1 = new hg();
            $this->n2->ii();
        }
    }
    public function nf()
    {
        $this->na = uniqid();
        $ng = $this->mu->jo();
        $this->b6->bk("Connecting to the cluster member: " . $ng);
        $this->n3 = new b0($this, $ng->jc(), $ng->jd(), $this->b4, $this->na, $this->b6);
        $this->n3->bc();
    }
    public function bh()
    {
        if ($this->b7->ne() !== MigratoryDataClient::TRANSPORT_HTTP) {
            $q = $this->n1->r($this->mu->bm()->jc(), $this->b7->bg());
            $this->n3->bp($q->aw());
        }
        $this->b4->nh($this->na, ni::nj);
        $this->b4->nk();
        $this->nl();
    }
    private function nl()
    {
        $this->mv = mw::nm;
        if ($this->mx === false) {
            $nn = $this->b7->no();
            foreach ($nn as $np) {
                $this->nq(array($np->h()), $np->i(),
                    $np->j());
            }
        }
        $this->nr();
    }
    public function bj($b5, $ns)
    {
        if (!isset($this->na) || $b5 != $this->na) {
            return;
        }
        $this->mv = mw::ed;
        $this->b6->bx(c4::c9 . $this->na . " " . $ns);
        $this->b4->bj($this->na, a2::k4);
    }
    public function nq($kf, $cq, $g)
    {
        if (!isset($kf) || count($kf) == 0) {
            return;
        }
        $kf = a2::ke($kf);
        $nt = array_diff($kf, $this->nb->kz());
        if (count($nt) == 0) {
            return 0;
        }
        $this->nb->kw($nt, $cq, $g);
        if ($this->mv === mw::nu) {
            $this->nv($nt);
        }
    }
    private function nv($kf)
    {
        $q = $this->n1->n($this->mu->bm()->jc());
        if (!isset($kf) || count($kf) === 0) {
            $this->nw($q, $this->nb->l3());
        } else {
            foreach ($kf as $e) {
                $this->nw($q, $this->nb->h($e));
            }
        }
        $this->n1->p($q);
        $this->n3->bp($q->aw());
    }
    private function nw($q, $e)
    {
        if ($this->n9) {
            $this->n9 = false;
            $this->n2->ij($q, $e, $this->ik, $this->b7->nx(),
                $this->b7->ny(), $this->b7->nz(), $this->b7->o0(), $this->ip);
        } else {
            $this->n2->ij($q, $e, $this->ik,
                null, null, null, $this->b7->o0(), $this->ip);
        }
    }
    public function o1($kf)
    {
        if (!isset($kf) || count($kf) == 0) {
            return;
        }
        $o2 = array_intersect($kf, $this->nb->kz());
        if (count($o2) == 0) {
            return;
        }
        $ky = $this->nb->kx($o2);
        if ($this->mv === mw::nu) {
            $this->o3($ky);
        }
    }
    private function o3($kf)
    {
        $q = $this->n1->n($this->mu->bm()->jc());
        foreach ($kf as $e) {
            $this->n2->is($q, $this->ik, $e);
        }
        $this->n1->p($q);
        $this->n3->bp($q->aw());
    }
    public function o4()
    {
        $this->o5();
        if ($this->my == mz::o6) {
            return;
        }
        $this->mu->jt($this->mu->bm());
        $this->mx = true;
        $this->nf();
    }
    public function o5()
    {
        $this->b4->o7();
        $this->o8();
        if (isset($this->n3)) {
            $this->n3->bq();
        }
        $this->n3 = null;
    }
    private function o8()
    {
        $this->mv = mw::ed;
        $this->ik = -1;
        $this->n6 = false;
        $this->n9 = true;
    }
    public function o9()
    {
        $this->my = mz::o6;
        $this->o5();
    }
    public function oa($bw)
    {
        if ($this->ik === -1) {
            $this->ob($bw);
            return;
        }
        $this->oc($bw);
    }
    public function nr()
    {
        $this->nv(null);
    }
    public function oc($bw)
    {
        $v = $bw->getReplySubject();
        if (strlen($v) > 0 && a2::kd($v) && !$this->nb->l2($v)) {
            $this->nq(array($v), 0, 0);
        }
        $q = $this->n1->n($this->mu->bm()->jc());
        $this->n2->iu($q, $bw, $this->ik);
        $this->n1->p($q);
        $this->n3->bp($q->aw());
    }
    public function od()
    {
        $q = $this->n1->n($this->mu->bm()->jc());
        $this->n2->it($q, $this->ik);
        $this->n1->p($q);
        $this->n3->bp($q->aw());
    }
    public function ob($bw)
    {
        if (isset($bw) && strlen($bw->getClosure()) > 0) {
            $this->kl->onStatus(MigratoryDataClient::NOTIFY_PUBLISH_FAILED, $bw->getClosure());
        }
    }
    public function oe()
    {
        if ($this->my != mz::n0) {
            return;
        }
        $this->b6->bk("Call pause");
        $this->my = mz::of;
        $this->o5();
    }
    public function og()
    {
        if ($this->my != mz::of) {
            return;
        }
        $this->b6->bk("Call resume");
        $this->my = mz::n0;
        $this->o4();
    }
    public function ba()
    {
        return $this->b3;
    }
    public function oh()
    {
        return $this->b6;
    }
    public function bl()
    {
        return $this->mu;
    }
    public function bn()
    {
        return $this->na;
    }
    public function oi($oj)
    {
        $this->na = $oj;
    }
    public function ok()
    {
        return $this->n7;
    }
    public function ol()
    {
        $this->n7++;
        return $this->n7;
    }
    public function om($mv)
    {
        $this->mv = $mv;
    }
    public function on()
    {
        return $this->my;
    }
    public function bb()
    {
        return $this->b7;
    }
    public function bi($q)
    {
        if ($this->b7->ne() === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            $lx = lt::lu($q);
        } else {
            $lx = lt::m3($q);
        }
        if (count($lx) > 0) {
            $this->oo($lx);
        } else {
            $this->b6->bx(c4::c6);
            $this->b4->nh($this->na, ni::op);
        }
    }
    private function oo($lx)
    {
        foreach ($lx as $bw) {
            switch ($bw->dl()) {
                case e7::ea:
                case e7::eg:
                case e7::cc:
                case e7::ef:
                case e7::e8:
                case e7::e9:
                    $this->b6->bx(c4::c5 . " " . $bw);
                    $this->oq($bw);
                    break;
                case e7::el:
                    break;
                default:
                    $this->b6->by("No existing operation for message: " . $bw);
            }
        }
    }
    private function oq($bw)
    {
        $this->b4->nh($this->na, ni::op);
        $dk = $bw->dm();
        switch ($bw->dl()) {
            case e7::ea:
                $this->os($dk);
                break;
            case e7::e8:
                $this->ot($dk);
                break;
            case e7::e9:
                $this->ou($dk);
                break;
            case e7::eg:
                $this->ov($dk);
                break;
            case e7::cc:
                $this->ow($dk);
                break;
            case e7::ef:
                $this->ox($dk);
                break;
            default:
                $this->b6->by("No existing operation for message: " . $bw);
        }
    }
    private function os($dk)
    {
        if (array_key_exists(ep::eq, $dk)) {
            $e = $dk[ep::eq];
            $ki = $this->nb->h($e);
            if (!isset($ki)) {
                return;
            }
        }
        if (array_key_exists(ep::er, $dk)) {
            $a6 = $dk[ep::er];
        }
        $z = false;
        $a0 = false;
        if (array_key_exists(ep::fe, $dk)) {
            $oy = $dk[ep::fe];
            switch ($oy) {
                case h2::h3:
                    $z = true;
                    break;
                case h2::h5:
                    $a0 = true;
                    break;
            }
        }
        $w = lt::mp($dk);
        $a1 = lt::mr($dk);
        $v = "";
        if (array_key_exists(ep::fl, $dk)) {
            $v = $dk[ep::fl];
        }
        $oz = new jx($e, $a6, "", $v, $w, $a1, $z, $a0);
        if ($this->n8 && !$this->nb->l0($e)) {
            if (array_key_exists(ep::es, $dk)) {
                $x = $dk[ep::es];
            }
            if (array_key_exists(ep::et, $dk)) {
                $cr = $dk[ep::et];
            }
            $oz->d1($x);
            $oz->jy($cr);
            $p0 = a2::kh($ki, $x, $cr, $this->kl, $this->b6);
            if ($p0 == km::kn) {
                if ($this->ip) {
                    $this->p1($ki->h(), $x, $cr, $this->ik);
                }
                $this->b6->bx(c4::ca . $oz);
                $this->kl->onMessage($oz);
            } else if ($p0 == km::kp) {
                $this->bj($this->na, "seq_higher");
            }
        } else {
            $this->b6->bx(c4::ca . $oz);
            $this->kl->onMessage($oz);
        }
    }
    private function ot($dk)
    {
        if (array_key_exists(ep::ev, $dk)) {
            $ik = $dk[ep::ev];
            $this->p2();
            $this->ik = $ik;
            $this->n6 = true;
            $this->n7 = 0;
            if (array_key_exists(ep::fj, $dk)) {
                $p3 = $dk[ep::fj];
                if ($p3 == 1) {
                    $this->n8 = true;
                }
            }
            if (array_key_exists(ep::fh, $dk)) {
                $p4 = $dk[ep::fh];
                $this->b4->p5($p4);
                $this->b4->nh($this->na, ni::op);
            }
            if (array_key_exists(ep::fn, $dk)) {
                $p6 = $dk[ep::fn];
                if ($p6 === 1) {
                    $this->ip = true;
                }
            }
            $this->mv = mw::nu;
            $kf = $this->nb->kz();
            if (count($kf) > 0) {
                $this->nv($kf);
            }
        }
    }
    private function p7()
    {
        $this->n4 = false;
        $this->n5 = 0;
    }
    private function p2()
    {
        $this->b6->bk("Connected to cluster member: " . $this->mu->bm());
        $this->p7();
        $this->b6->bx(c4::c7 . MigratoryDataClient::NOTIFY_SERVER_UP . " " . $this->na);
        $this->kl->onStatus(MigratoryDataClient::NOTIFY_SERVER_UP, $this->mu->bm()->je());
    }
    public function p8($p9)
    {
        $this->b6->bz("[" . $p9 . "] [" . $this->mu->bm() . "]");
        $this->b6->bk("Lost connection with the cluster member: " . $this->mu->bm());
        if (!$this->n6) {
            $this->n5++;
            if (!$this->n4) {
                if ($this->n5 >= $this->b7->pa()) {
                    $this->b6->bx(c4::c8 . $p9);
                    $this->kl->onStatus(MigratoryDataClient::NOTIFY_SERVER_DOWN, $this->mu->bm()->je());
                    $this->n4 = true;
                }
            }
        }
    }
    private function ou($dk)
    {
    }
    private function ov($dk)
    {
        if (array_key_exists(ep::f4, $dk)
            && array_key_exists(ep::eq, $dk)) {
            $pb = $dk[ep::f4];
            $e = $dk[ep::eq];
            $pc = true;
            $pd = MigratoryDataClient::NOTIFY_SUBSCRIBE_DENY;
            if ($pb == h9::hb) {
                $pd = MigratoryDataClient::NOTIFY_SUBSCRIBE_ALLOW;
                $pc = false;
            } else if ($pb == h9::ha) {
                if (array_key_exists(ep::ez, $dk) && $dk[ep::ez] === hc::hf) {
                    $pd = MigratoryDataClient::NOTIFY_SUBSCRIBE_TIMEOUT;
                } else {
                    $pd = MigratoryDataClient::NOTIFY_SUBSCRIBE_DENY;
                }
            }
            if ($pc) {
                $this->nb->kx(array($e));
            }
            if (array_key_exists(ep::fp, $dk)) {
                $pe = $dk[ep::fp];
                $this->b6->bx(c4::cd . $e . " " . $pb . " " . $pd);
                $this->kl->onStatus($pe, $e);
            } else {
                $this->b6->bx(c4::cd . $e . " " . $pb . " " . $pd);
                $this->kl->onStatus($pd, $e);
            }
        }
    }
    private function ow($dk)
    {
        if (!isset($dk)) {
            return;
        }
        if (array_key_exists(ep::fi, $dk)
            && array_key_exists(ep::f4, $dk)) {
            $u = $dk[ep::fi];
            $pf = $dk[ep::f4];
            $da = MigratoryDataClient::NOTIFY_PUBLISH_FAILED;
            if ($pf == a2::k3) {
                $da = MigratoryDataClient::NOTIFY_PUBLISH_DENIED;
            } else if ($pf == a2::k1) {
                $da = MigratoryDataClient::NOTIFY_PUBLISH_OK;
            }
            if (array_key_exists(ep::fp, $dk)) {
                $pe = $dk[ep::fp];
                $this->b6->bx(c4::cc . $pe . " " . $u);
                $this->kl->onStatus($pe, $u);
            } else {
                $this->b6->bx(c4::cc . $da . " " . $u);
                $this->kl->onStatus($da, $u);
            }
        }
    }
    private function ox($dk)
    {
        $e = "";
        if (array_key_exists(ep::eq, $dk)) {
            $e = $dk[ep::eq];
        }
        if (array_key_exists(ep::fe, $dk)) {
            $da = $dk[ep::fe];
        }
        $this->b6->bx("Recovery status for subject: " . $e . " is " . $da);
        if (a2::ka == $da) {
            $kf = $this->nb->kz();
            foreach ($kf as $e) {
                $ki = $this->nb->h($e);
                $pg = $ki->db();
                if (a2::cw === $pg ||
                    a2::k7 === $pg ||
                    a2::k6 === $pg) {
                    $ki->d8();
                } else {
                    $ki->d6();
                }
            }
        } else {
            $ki = $this->nb->h($e);
            if (isset($ki)) {
                $ki->d9($da);
            }
        }
    }
    private function p1($e, $x, $cr, $ik)
    {
        $q = $this->n1->n($this->mu->bm()->jc());
        $this->n2->iz($q, $e, $x, $cr, $ik);
        $this->n1->p($q);
        $this->n3->bp($q->aw());
    }
}
class km
{
    const kn = 0;
    const ko = 1;
    const kp = 2;
}
class ni
{
    const nj = 0;
    const op = 1;
}
class mz
{
    const o6 = 0;
    const of = 1;
    const n0 = 2;
}
class mw
{
    const ed = 0;
    const ph = 1;
    const nm = 2;
    const nu = 3;
}
class pi
{
    const pj = 30;
    const pk = 900;
    const pl = 10;
    private $pm = 3;
    private $pn = MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF;
    private $po = 20;
    private $pp = 360;
    private $pq = 5;
    private $fm = 2;
    private $im;
    private $in;
    private $j7 = false;
    private $pr = 1;
    private $ps = null;
    private $pt = 1000;
    private $ih = MigratoryDataClient::TRANSPORT_WEBSOCKET;
    private $kf = array();
    public function __construct($im, $in)
    {
        $this->im = $im;
        $this->in = $in;
    }
    public function pu($kf, $f, $g)
    {
        foreach ($kf as $e) {
            array_push($this->kf, new d($e, $f, $g));
        }
    }
    public function kx($kf)
    {
        foreach ($kf as $e) {
            $i9 = count($this->kf);
            for ($g2 = 0; $g2 < $i9; $g2++) {
                if ($e === $this->kf[$g2]->h()) {
                    unset($this->kf[$g2]);
                    break;
                }
            }
            $this->kf = array_values($this->kf);
        }
    }
    public function no()
    {
        return $this->kf;
    }
    public function o0()
    {
        return $this->fm;
    }
    public function ny()
    {
        return $this->im;
    }
    public function pv($j7)
    {
        $this->j7 = $j7;
    }
    public function bg()
    {
        return $this->j7;
    }
    public function pw($ps)
    {
        $this->ps = $ps;
    }
    public function nx()
    {
        return $this->ps;
    }
    public function px($ih)
    {
        $this->ih = $ih;
    }
    public function ne()
    {
        return $this->ih;
    }
    public function py($pm)
    {
        $this->pm = $pm;
    }
    public function pz()
    {
        return $this->pm;
    }
    public function q0()
    {
        return $this->pn;
    }
    public function q1($pn)
    {
        $this->pn = $pn;
    }
    public function q2()
    {
        return $this->po;
    }
    public function q3($po)
    {
        $this->po = $po;
    }
    public function q4()
    {
        return $this->pq;
    }
    public function q5($pq)
    {
        $this->pq = $pq;
    }
    public function pa()
    {
        return $this->pr;
    }
    public function q6($pr)
    {
        $this->pr = $pr;
    }
    public function q7()
    {
        return $this->pp;
    }
    public function q8($pp)
    {
        $this->pp = $pp;
    }
    public function nz()
    {
        return $this->in;
    }
    public function be()
    {
        return $this->pt;
    }
    public function q9($pt)
    {
        $this->pt = $pt;
    }
}
class nd
{
    private $qa = null;
    private $qb = null;
    private $qc = null;
    private $b7;
    private $b1;
    private $qd = pi::pj;
    public function __construct($nc, $b1)
    {
        $this->b7 = $nc;
        $this->b1 = $b1;
    }
    public function nh($oj, $qe)
    {
        if (isset($this->qa)) {
            $this->b1->ba()->cancelTimer($this->qa);
        }
        $qf = $this->qd;
        if ($qe == ni::nj) {
            $qg = $this->b1->ok();
            $qf = $this->qh($qg, true);
        }
        if ($qf > 0) {
            $this->qa = $this->b1->ba()->addTimer($qf, function () use ($oj) {
                $na = $this->b1->bn();
                if (!isset($na) || $na !== $oj) {
                    return;
                }
                $this->b1->om(mw::ed);
                $this->b1->o5();
                $this->bj($na, a2::k5);
            });
        }
    }
    public function bj($oj, $p9)
    {
        if ($this->b1->on() != mz::n0) {
            return;
        }
        $na = $this->b1->bn();
        if (!isset($na) || $na !== $oj) {
            return;
        }
        $this->b1->oi(null);
        $qg = $this->b1->ol();
        $qf = $this->qh($qg, false);
        $this->qi($qf, $p9);
    }
    public function qi($qj, $p9)
    {
        if (isset($this->qc)) {
            $this->b1->ba()->cancelTimer($this->qc);
        }
        $this->qc = $this->b1->ba()->addTimer($qj, function () use ($p9) {
            $this->b1->p8($p9);
            $this->b1->o4();
        });
    }
    public function p5($b)
    {
        $this->qd = $b * 1.4;
    }
    public function nk()
    {
        if (isset($this->qb)) {
            $this->b1->ba()->cancelTimer($this->qb);
        }
        $this->qb = $this->b1->ba()->addTimer(pi::pk, function () {
            $this->b1->od();
            $this->nk();
        });
    }
    public function o7()
    {
        if (isset($this->qa)) {
            $this->b1->ba()->cancelTimer($this->qa);
        }
        if (isset($this->qb)) {
            $this->b1->ba()->cancelTimer($this->qb);
        }
        if (isset($this->qc)) {
            $this->b1->ba()->cancelTimer($this->qc);
        }
    }
    private function qh($qg, $qk)
    {
        $qf = $this->qd;
        if ($qg > 0) {
            if ($qg <= $this->b7->pz()) {
                $qf = ($qg * $this->b7->q4()) - floor((mt_rand() / mt_getrandmax()) * $this->b7->q4());
            } else {
                if ($this->b7->q0() === MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF) {
                    $ql = $qg - $this->b7->pz();
                    $qf = min(($this->b7->q2() * (2 ** $ql)) - floor((mt_rand() / mt_getrandmax()) * $this->b7->q2() * $ql), $this->b7->q7());
                } else {
                    $qf = $this->b7->qm();
                }
            }
            if ($qk && $qf < pi::pl) {
                $qf = pi::pl;
            }
        }
        return $qf;
    }
}
class qn
{
    private $qo = 3;
    private $ff;
    private $qp = false;
    private $nc = null;
    private $b1 = null;
    private $jm = null;
    private $b3 = null;
    private $qq = null;
    private $b6 = null;
    public function __construct()
    {
        $this->ff = "MigratoryDataClient/v5.0 React-PHP/" . phpversion();
        $this->nc = new pi($this->qo, $this->ff);
        $this->b6 = new c0();
    }
    private function qr($mb, $qs)
    {
        if (!isset($mb)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: " . $qs . " - invalid first argument; expected an array of strings");
        }
        foreach ($mb as $mj) {
            if (!is_string($mj)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: " . $qs . " - invalid first argument; expected an array of strings");
            }
        }
    }
    public function qt($b3)
    {
        if ($this->qp === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setLoop() method");
        }
        $this->b3 = $b3;
    }
    public function pw($ps)
    {
        if ($this->qp === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setEntitlementToken() method");
        }
        if (trim($ps) === '') {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setEntitlementToken() - invalid argument; expected a non-empty string");
        }
        $this->nc->pw($ps);
        $this->b6->bk("Configuring entitlement token: " . $ps);
    }
    public function qu($jm)
    {
        $this->qr($jm, "setServers()");
        if ($this->qp === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setServers() method");
        }
        if (!is_array($jm) || count($jm) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setServers() - invalid argument; expected a array of strings with size > 0");
        }
        foreach ($jm as $addr) {
            if (!isset($addr) || trim($addr) === '') {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setServers() - invalid argument; expected a array of strings with size > 0");
            }
        }
        $this->b6->bk("Setting servers to connect to: " . a2::a3($jm));
        $this->jm = $jm;
    }
    public function qv($kl)
    {
        if ($this->qp === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setListener() method");
        }
        $this->qq = $kl;
    }
    public function qw($c1, $c2)
    {
        if ($c2 < 0 || $c2 > 4) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setLogListener() - invalid second argument; expected a MigratoryDataLogLevel");
        }
        if ($this->qp === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "Error: setLogListener() - already connected; use this method before connect()");
        }
        $this->b6->c3($c1, $c2);
    }
    public function nf()
    {
        if ($this->qp === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "connect() method");
        }
        if (!isset($this->b3)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setLoop().");
        }
        if (!isset($this->qq)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setListener()");
        }
        if (!isset($this->jm)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setServers().");
        }
        $this->qp = true;
        $mu = new ji($this->jm, $this->nc->bg());
        $this->b1 = new mt($this->nc, $mu, $this->b3, $this->qq, $this->b6);
        $this->b1->nf();
    }
    public function o5()
    {
        $this->b6->bk("Disconnect from push server and release all resources.");
        if ($this->qp === true) {
            $this->qp = false;
            $this->b6->bx(c4::ce);
            $this->b1->o9();
        }
    }
    public function nq($kf, $cq, $g)
    {
        $this->qr($kf, "subscribe()");
        if (!isset($kf) || count($kf) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid first argument; expected a array of strings with size > 0");
        }
        if ($g < 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid second argument; a int with value >= 0");
        }
        $this->b6->bk("Subscribing to: " . a2::a3($kf));
        $this->nc->pu($kf, $cq, $g);
        if ($this->qp) {
            $this->b1->nq($kf, $cq, $g);
        }
    }
    public function o1($kf)
    {
        $this->qr($kf, "subscribe()");
        if (!isset($kf) || count($kf) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: unsubscribe() - invalid argument; expected a array of strings with size > 0");
        }
        $this->b6->bk("Unsubscribing from: " . a2::a3($kf));
        $this->nc->kx($kf);
        if ($this->qp) {
            $this->b6->bx(c4::ci . a2::a3($kf));
            $this->b1->o1($kf);
        }
    }
    public function oa($bw)
    {
        if ($this->qp === false) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_CONNECTED, "publish() method");
        }
        $e = $bw->getSubject();
        $t = $bw->getContent();
        if (is_null($e) || strlen($e) == 0 || !a2::kd($e)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: publish() - invalid argument; expected a valid message with a non-empty topic");
        }
        if (is_null($t) || strlen($t) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: publish() - invalid argument; expected a valid message with a non-empty content");
        }
        $this->b6->bx(c4::cj . $bw);
        $this->b1->oa($bw);
    }
    public function oe()
    {
        if (!$this->qp) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "pause() method");
        }
        $this->b6->bk("Migratorydata client calls pause");
        $this->b6->bx(c4::cf);
        $this->b1->oe();
    }
    public function og()
    {
        if (!$this->qp) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "resume() method");
        }
        $this->b6->bk("Migratorydata client calls resume");
        $this->b6->bx(c4::cg);
        $this->b1->og();
    }
    public function no()
    {
        $nn = $this->nc->no();
        $qx = array();
        foreach ($nn as $e){
            array_push($qx, $e->h());
        }
        return $qx;
    }
    public function qy($dd)
    {
        if ($dd !== MigratoryDataClient::TRANSPORT_HTTP && $dd !== MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Argument for set_transport must be MigratoryDataClient::TRANSPORT_WEBSOCKET or MigratoryDataClient::TRANSPORT_HTTP");
        }
        if ($this->qp === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setTransport() method");
        }
        $this->nc->px($dd);
        $this->b6->bk("Configuring transport type to: " . $dd);
    }
    public function pv($s)
    {
        if ($this->qp === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setEncryption() method");
        }
        $this->nc->pv($s);
        $this->b6->bk("Configuring encryption to: " . a2::a4($s));
    }
    public function py($du)
    {
        if ($this->qp === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setQuickReconnectMaxRetries() method");
        }
        if ($du < 2) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setQuickReconnectMaxRetries() - invalid argument; expected an integer higher or equal to 2");
        }
        $this->b1->py($du);
        $this->b6->bk("Configuring quickreconnect max retries to: " . $du);
    }
    public function q1($qz)
    {
        if ($this->qp === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectPolicy() method");
        }
        if (!isset($qz) || ($qz !== MigratoryDataClient::CONSTANT_WINDOWS_BACKOFF && $qz !== MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectPolicy() - invalid argument; expected MigratoryDataClient.CONSTANT_WINDOW_BACKOFF or MigratoryDataClient.TRUNCATED_EXPONENTIAL_BACKOFF");
        }
        $this->nc->q1($qz);
        $this->b6->bk("Configuring reconnect policy to: " . $qz);
    }
    public function q3($r0)
    {
        if ($this->qp === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectTimeInterval() method");
        }
        if ($r0 < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectTimeInterval() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->nc->q3($r0);
        $this->b6->bk("Configuring setReconnectTime interval to: " . $r0);
    }
    public function r1($ie)
    {
        if ($this->qp === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "notifyAfterFailedConnectionAttempts() method");
        }
        if ($ie < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: notifyAfterFailedConnectionAttempts() - invalid argument; expected a positive integer");
        }
        $this->nc->q6($ie);
        $this->b6->bk("Configuring the number of failed connection attempts before sending a notification: " . $ie);
    }
    public function q8($r2)
    {
        if ($this->qp === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectMaxDelay() method");
        }
        if ($r2 < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectMaxDelay() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->nc->q8($r2);
        $this->b6->bk("Configuring setReconnectMax delay to: " . $r2);
    }
    public function q5($r0)
    {
        if ($this->qp === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setQuickReconnectInitialDelay() method");
        }
        if ($r0 < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setQuickReconnectInitialDelay() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->nc->q5($r0);
        $this->b6->bk("Configuring quickReconnectInitial delay to: " . $r0);
    }
    public function r3()
    {
        return $this->qq;
    }
    public function r4($pt)
    {
        if ($this->qp === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setConnectionTimeout() method");
        }
        $this->nc->q9($pt);
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
    const NOTIFY_SUBSCRIBE_TIMEOUT = 'NOTIFY_SUBSCRIBE_TIMEOUT';
    const NOTIFY_PUBLISH_OK = 'NOTIFY_PUBLISH_OK';
    const NOTIFY_PUBLISH_FAILED = 'NOTIFY_PUBLISH_FAILED';
    const NOTIFY_PUBLISH_DENIED = 'NOTIFY_PUBLISH_DENIED';
    const CONSTANT_WINDOWS_BACKOFF = 'CONSTANT_WINDOW_BACKOFF';
    const TRUNCATED_EXPONENTIAL_BACKOFF = 'TRUNCATED_EXPONENTIAL_BACKOFF';
    const TRANSPORT_HTTP = 'TRANSPORT_HTTP';
    const TRANSPORT_WEBSOCKET = 'TRANSPORT_WEBSOCKET';
    private $r5 = null;
    public function __construct()
    {
        $this->r5 = new qn();
    }
    public function setLoop(\React\EventLoop\LoopInterface $b3)
    {
        $this->r5->qt($b3);
    }
    public function setListener(MigratoryDataListener $kl)
    {
        $this->r5->qv($kl);
    }
    public function setLogListener(MigratoryDataLogListener $c1, int $c2)
    {
        $this->r5->qw($c1, $c2);
    }
    public function setEntitlementToken(string $ps)
    {
        $this->r5->pw($ps);
    }
    public function setServers(array $jm)
    {
        $this->r5->qu($jm);
    }
    public function connect()
    {
        $this->r5->nf();
    }
    public function disconnect()
    {
        $this->r5->o5();
    }
    public function subscribe(array $kf)
    {
        $this->r5->nq($kf, 0, 0);
    }
    public function subscribeWithConflation(array $kf, int $r6)
    {
        $this->r5->nq($kf, $r6, 0);
    }
    public function subscribeWithHistory(array $kf, int $r7)
    {
        $this->r5->nq($kf, 0, $r7);
    }
    public function unsubscribe(array $kf)
    {
        $this->r5->o1($kf);
    }
    public function publish(MigratoryDataMessage $bw)
    {
        $this->r5->oa($bw);
    }
    public function pause()
    {
        $this->r5->oe();
    }
    public function resume()
    {
        $this->r5->og();
    }
    public function setTransport(string $dd)
    {
        $this->r5->qy($dd);
    }
    public function setEncryption(bool $s)
    {
        $this->r5->pv($s);
    }
    public function getSubjects()
    {
        return $this->r5->no();
    }
    public function getListener()
    {
        return $this->r5->r3();
    }
    public function setQuickReconnectMaxRetries(int $qg)
    {
        $this->r5->py($qg);
    }
    public function setReconnectPolicy(string $qz)
    {
        $this->r5->q1($qz);
    }
    public function setReconnectTimeInterval(int $r8)
    {
        $this->r5->q3($r8);
    }
    public function notifyAfterFailedConnectionAttempts(int $qg)
    {
        $this->r5->r1($qg);
    }
    public function setReconnectMaxDelay(int $r8)
    {
        $this->r5->q8($r8);
    }
    public function setQuickReconnectInitialDelay(int $r8)
    {
        $this->r5->q5($r8);
    }
    public function setConnectionTimeout(int $pt)
    {
        $this->r5->r4($pt);
    }
}
