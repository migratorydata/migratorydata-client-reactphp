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
class CompressionAlgorithm
{
	const NONE = 0;
	const ZLIB_BASE64 = 1;
	const ZLIB_BINARY = 2;
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
    protected $s = CompressionAlgorithm::NONE;
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
        if ($compressionBool) {
            if ($this->s != CompressionAlgorithm::ZLIB_BINARY) {
                $this->s = CompressionAlgorithm::ZLIB_BASE64;
            }
        } else {
            $this->s = CompressionAlgorithm::NONE;
        }
    }
    public function setCompressionAlgorithm($alg)
    {
        if ($alg == CompressionAlgorithm::ZLIB_BASE64) {
            $this->s = CompressionAlgorithm::ZLIB_BASE64;
        } else if ($alg == CompressionAlgorithm::ZLIB_BINARY) {
            $this->s = CompressionAlgorithm::ZLIB_BINARY;
        } else {
            $this->s = CompressionAlgorithm::NONE;
        }
    }
    public function isCompressed()
    {
        return $this->s != CompressionAlgorithm::NONE;
    }
    public function getCompressionAlgorithm() {
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
        $w = "NONE";
        if ($this->s === CompressionAlgorithm::ZLIB_BASE64) {
            $w = "ZLIB_BASE64";
        } else if ($this->s === CompressionAlgorithm::ZLIB_BINARY) {
            $w = "ZLIB_BINARY";
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
            x::y($this->p) .
            ", qos=" .
            $u .
            ", messageType=" .
            $v .
            ", seq=" .
            $this->q .
            ", epoch=" .
            $this->r .
            ", compression=" .
            $w .
            "]";
    }
}
class z
{
    private $a0 = "";
    private $a1 = -1;
    private $a2 = -1;
    private $a3 = -1;
    private $a4 = -1;
    private $a5 = 0;
    private $a6 = "";
    private $a7 = -1;
    public function __construct()
    {
    }
    public function a8($a0)
    {
        $this->a0 .= $a0;
    }
    public function a9($a0)
    {
        $this->a6 .= $a0;
    }
    public function aa()
    {
        $this->a7 = ($this->a7 == 3) ? 0 : ($this->a7 + 1);
        return $this->a6[$this->a7];
    }
    public function ab()
    {
        return $this->a5;
    }
    public function a5($a5)
    {
        $this->a5 = $a5;
    }
    public function ac($ad, $ae)
    {
        $this->a0[$ad] = $ae;
    }
    public function af($ad)
    {
        return $this->a0[$ad];
    }
    public function ag()
    {
        $this->a1 = strlen($this->a0);
    }
    public function ah()
    {
        $this->a2 = strlen($this->a0);
    }
    public function ai()
    {
        $this->a3 = strlen($this->a0);
    }
    public function aj()
    {
        $this->a4 = strlen($this->a0);
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
    public function an()
    {
        return $this->a4;
    }
    public function ao($__data)
    {
        $this->a0 = $__data;
    }
    public function ap()
    {
        return $this->a0;
    }
    public function aq()
    {
        if($this->a5 === 0){
            return $this->a0;
        } else {
            return substr($this->a0, $this->a5);
        }
    }
    public function ar()
    {
        return strlen($this->a0);
    }
    public function at()
    {
        $this->a0 = "";
        $this->a5 = 0;
    }
    public function au()
    {
        $this->a0 = substr($this->a0, $this->a5);
        $this->a5 = 0;
    }
}
class av
{
    private $aw;
    private $e;
    private $ax;
    private $ay;
    private $az;
    private $b0;
    private $b1;
    private $b2;
    private $b3 = null;
    private $b4 = array();
    private $h = null;
    public function __construct($aw, $e, $ax,
                                $az, $b0, $b1)
    {
        $this->aw = $aw;
        $this->e = $e;
        $this->ax = $ax;
        $this->ay = $aw->b5();
        $this->az = $az;
        $this->b0 = $b0;
        $this->b1 = $b1;
        $this->b2 = $aw->b6();
        $this->h = new z();
    }
    public function b7()
    {
        $b8 = new \React\Socket\Connector($this->ay, array(
            'tls' => array(
                'allow_self_signed' => true
            ),
            'timeout' => ($this->b2->b9() / 1000)
        ));
        $ba = "";
        if ($this->b2->bb()) {
            $ba = "tls://";
        }
        $b8->connect($ba . $this->e . ":" . $this->ax)
            ->then(
                function (\React\Socket\ConnectionInterface $b3) {
                    $this->b3 = $b3;
                    if (count($this->b4) > 0) {
                        foreach ($this->b4 as $message) {
                            $b3->write($message);
                        }
                        $this->b4 = array();
                    }
                    $this->aw->bc();
                    $b3->on('data', function ($a0) {
                        if (isset($a0) && strlen($a0) !== 0) {
                            $this->h->a8($a0);
                            $this->aw->bd($this->h);
                            if ($this->h->ab() > 0 && $this->h->ab() < strlen($this->h->ap())) {
                                $this->h->au();
                            } else if ($this->h->ab() >= $this->h->ar()) {
                                $this->h->at();
                            }
                        }
                    });
                    $b3->on('end', function () {
                        $this->aw->be($this->b0, x::bf, "socket_end");
                    });
                    $b3->on('close', function () {
                        $this->aw->be($this->b0, x::bf, "socket_close");
                    });
                    $b3->on('error', function (\Exception $e) {
                        $this->aw->be($this->b0, x::bf, "socket_error");
                    });
                },
                function (\Exception $exception) {
                    $this->b1->bg("Failed to connect to: " . $this->aw->bh()->bi() . ", message: " . $exception->getMessage());
                    $this->az->be($this->aw->bj(), x::bk);
                }
            );
    }
    public function bl($a0)
    {
        if (isset($this->b3)) {
            $this->b3->write($a0);
        } else {
            array_push($this->b4, $a0);
        }
    }
    public function bm()
    {
        if (isset($this->b3)) {
            $this->b3->close();
            $this->b3 = null;
        }
    }
}
class bn implements MigratoryDataLogListener
{
    function onLog($log, $migratoryDataLogLevel)
    {
        if ($migratoryDataLogLevel === MigratoryDataLogLevel::TRACE) {
            $bo = "TRACE";
        } else if ($migratoryDataLogLevel === MigratoryDataLogLevel::DEBUG) {
            $bo = "DEBUG";
        } else if ($migratoryDataLogLevel === MigratoryDataLogLevel::INFO) {
            $bo = "INFO";
        } else if ($migratoryDataLogLevel === MigratoryDataLogLevel::WARN) {
            $bo = "WARN";
        } else if ($migratoryDataLogLevel === MigratoryDataLogLevel::ERROR) {
            $bo = "ERROR";
        }
        $bp = date('Y-m-d H:i:s');
        echo "[" . $bp . "] [" . $bo . "] " . $log . PHP_EOL;
    }
}
interface bq
{
    function br($bs);
    function bt($bs);
    function bg($bs);
    function bu($bs);
    function bv($bs);
}
class bw implements bq
{
    private $bx;
    private $by = MigratoryDataLogLevel::INFO;
    public function __construct()
    {
        $this->bx = new bn();
    }
    public function bz($bx, $by)
    {
        $this->bx = $bx;
        $this->by = $by;
    }
    function br($bs)
    {
        if ($this->by <= MigratoryDataLogLevel::TRACE) {
            $this->bx->onLog($bs, MigratoryDataLogLevel::TRACE);
        }
    }
    function bt($bs)
    {
        if ($this->by <= MigratoryDataLogLevel::DEBUG) {
            $this->bx->onLog($bs, MigratoryDataLogLevel::DEBUG);
        }
    }
    function bg($bs)
    {
        if ($this->by <= MigratoryDataLogLevel::INFO) {
            $this->bx->onLog($bs, MigratoryDataLogLevel::INFO);
        }
    }
    function bu($bs)
    {
        if ($this->by <= MigratoryDataLogLevel::WARN) {
            $this->bx->onLog($bs, MigratoryDataLogLevel::WARN);
        }
    }
    function bv($bs)
    {
        if ($this->by <= MigratoryDataLogLevel::ERROR) {
            $this->bx->onLog($bs, MigratoryDataLogLevel::ERROR);
        }
    }
}
class c0
{
    const c1 = "[READ_EVENT] ";
    const c2 = "[PING_EVENT] ";
    const c3 = "[CONNECT_EVENT] ";
    const c4 = "[DISCONNECT_EVENT] ";
    const c5 = "[READER_DISCONNECT_EVENT] ";
    const c6 = "[MESSAGE_RECEIVED_EVENT] ";
    const c7 = "[WRITE_EVENT] ";
    const c8 = "[CLIENT_PUBLISH_RESPONSE] ";
    const c9 = "[ACK_FAILED_PUBLISH_WITH_CLOSURES] ";
    const ca = "[ENTITLEMENT_CHECK_RESPONSE] ";
    const cb = "[DISPOSE_EVENT] ";
    const cc = "[PAUSE_EVENT] ";
    const cd = "[RESUME_EVENT] ";
    const ce = "[SUBSCRIBE_EVENT] ";
    const cf = "[UNSUBSCRIBE_EVENT] ";
    const cg = "[PUBLISH_EVENT] ";
    const ch = "[REPUBLISH_EVENT] ";
    const ci = "[PING_SERVER_EVENT] ";
    const cj = "[CONNECT_SERVER_EVENT] ";
    const ck = "[RECONNECT_EVENT] ";
}
class cl
{
    private $cm = 2;
    private $k;
    private $cn;
    private $q = 0;
    private $co = 70000;
    private $cp = false;
    private $cq = 0;
    private $cr = 0;
    private $cs = x::ct;
    private $cu = cv::cw;
    public function __construct($k, $cn)
    {
        $this->k = $k;
        $this->cn = $cn;
    }
    public function cx()
    {
        return $this->q;
    }
    public function cy($q)
    {
        $this->q = $q;
        $this->cr++;
    }
    public function cz()
    {
        return $this->co;
    }
    public function d0($co)
    {
        $this->co = $co;
    }
    public function d1()
    {
        return $this->k;
    }
    public function d2()
    {
        return $this->cn;
    }
    public function d3()
    {
        $this->cr = 0;
        if ($this->d4()) {
            $this->cq++;
        }
    }
    public function d5()
    {
        $this->cq = 0;
    }
    public function cr()
    {
        return $this->cr;
    }
    public function d6($d7)
    {
        $this->cs = $d7;
    }
    public function d8()
    {
        return $this->cs;
    }
    public function d4()
    {
        return $this->co != 70000;
    }
    public function d9()
    {
        $da = cv::cw;
        if ($this->d4()) {
            if ($this->cq >= $this->cm) {
                if ($this->cn > 0) {
                    $da = cv::db;
                }
            } else {
                $da = cv::dc;
            }
        } else {
            if ($this->cn > 0) {
                $da = cv::db;
            }
        }
        if ($da == cv::cw || $da == cv::db) {
            $this->d6(x::ct);
            $this->d5();
        }
        $this->cu = $da;
        return $da;
    }
    public function cu()
    {
        return $this->cu;
    }
    public function dd()
    {
        $this->cu = cv::cw;
    }
    public function de()
    {
        $this->q = 0;
        $this->co = 70000;
        $this->cp = false;
        $this->cq = 0;
        $this->cr = 0;
        $this->cs = x::ct;
        $this->cu = cv::cw;
    }
    public function __toString()
    {
        return "[Subj=" .
            $this->k .
            ", Seq=" . $this->q .
            ", SeqId=" . $this->co .
            ", NeedRecovery=" . x::y($this->cp) .
            ", MessagesReceivedUntilRecovery=" . $this->cr .
            ", CacheRecoveryStatus=" . $this->cs .
            ", SubscribeType=" . $this->cu .
            ", NrOfConsecutiveRecovery=" . $this->cq .
            "]";
    }
}
class cv
{
    const cw = 0;
    const db = 1;
    const dc = 2;
}
class df
{
    private $dg;
    private $dh;
    public function __construct($dg, $dh)
    {
        $this->dg = $dg;
        $this->dh = $dh;
    }
    public function di()
    {
        return $this->dg;
    }
    public function dj()
    {
        return $this->dh;
    }
    public function __toString()
    {
        $dk = "";
        if (isset($this->dh) && isset($this->dg)) {
            $dk .= "OPERATION " . $this->dl($this->dg);
            $dk .= " Headers ";
            $dm = array_keys($this->dh);
            foreach ($dm as $dn) {
                $dp = $this->dq($dn);
                $dk .= $dp . ": " . $this->dh[$dn] . " - ";
            }
        }
        return $dk;
    }
    private function dl($dr)
    {
        switch ($dr) {
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
    private function dq($dr)
    {
        switch ($dr) {
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
class ds
{
    const dt = 0x00;
    const du = 0x22;
    const dv = 0x0A;
    const dw = 0x0D;
    const dx = 0x5C;
}
class dy
{
    public static $dz = array();
    public static $e0 = array();
    public static $e1 = array();
    public static $e2 = array();
    public static $e3 = array();
    public static $dh = array();
    public static $e4 = array();
    const e5 = 0x19;
    const e6 = 0x7F;
    const e7 = 0x1E;
    const e8 = 0x1F;
    public static function e9()
    {
        self::$dz = array_fill(0, 128, -1);
        self::$dz[ea::eb] = 0x01;
        self::$dz[ea::ec] = 0x02;
        self::$dz[ea::ed] = 0x03;
        self::$dz[ea::ee] = 0x04;
        self::$dz[ea::ef] = 0x05;
        self::$dz[ea::eg] = 0x06;
        self::$dz[ea::eh] = 0x07;
        self::$dz[ea::ei] = 0x08;
        self::$dz[ea::ej] = 0x09;
        self::$dz[ea::ek] = 0x0B;
        self::$dz[ea::el] = 0x0C;
        self::$dz[ea::em] = 0x0E;
        self::$dz[ea::en] = 0x0F;
        self::$dz[ea::eo] = 0x10;
        self::$dz[ea::ep] = 0x11;
        self::$dz[ea::eq] = 0x12;
        self::$dz[ea::c8] = 0x13;
        self::$dz[ea::er] = 0x14;
        self::$dz[ea::es] = 0x1A;
        self::$dz[ea::et] = 0x07;
        self::$dz[ea::eu] = 0x0B;
        self::$e0 = array_fill(0, 128, -1);
        self::$e0[ev::ew] = 0x01;
        self::$e0[ev::ex] = 0x02;
        self::$e0[ev::ey] = 0x03;
        self::$e0[ev::ez] = 0x04;
        self::$e0[ev::f0] = 0x05;
        self::$e0[ev::f1] = 0x06;
        self::$e0[ev::f2] = 0x07;
        self::$e0[ev::f3] = 0x08;
        self::$e0[ev::f4] = 0x09;
        self::$e0[ev::f5] = 0x0B;
        self::$e0[ev::f6] = 0x0C;
        self::$e0[ev::f7] = 0x0F;
        self::$e0[ev::f8] = 0x12;
        self::$e0[ev::f9] = 0x13;
        self::$e0[ev::fa] = 0x14;
        self::$e0[ev::fb] = 0x15;
        self::$e0[ev::fc] = 0x16;
        self::$e0[ev::fd] = 0x17;
        self::$e0[ev::fe] = 0x18;
        self::$e0[ev::ff] = 0x1A;
        self::$e0[ev::fg] = 0x27;
        self::$e0[ev::fh] = 0x23;
        self::$e0[ev::fi] = 0x24;
        self::$e0[ev::fj] = 0x25;
        self::$e0[ev::fk] = 0x10;
        self::$e0[ev::fl] = 0x11;
        self::$e0[ev::fm] = 0x28;
        self::$e0[ev::fo] = 0x2C;
        self::$e0[ev::fp] = 0x2D;
        self::$e0[ev::fq] = 0x30;
        self::$e0[ev::fr] = 0x1D;
        self::$e0[ev::fs] = 0x26;
        self::$e3 = array_fill(0, 128, -1);
        self::ft(ev::ew, fu::fv);
        self::ft(ev::ex, fu::fw);
        self::ft(ev::ey, fu::fx);
        self::ft(ev::ez, fu::fx);
        self::ft(ev::f0, fu::fx);
        self::ft(ev::f1, fu::fx);
        self::ft(ev::f2, fu::fw);
        self::ft(ev::f3, fu::fw);
        self::ft(ev::f4, fu::fw);
        self::ft(ev::f5, fu::fx);
        self::ft(ev::f6, fu::fw);
        self::ft(ev::f7, fu::fx);
        self::ft(ev::f8, fu::fv);
        self::ft(ev::f9, fu::fv);
        self::ft(ev::fa, fu::fv);
        self::ft(ev::fb, fu::fx);
        self::ft(ev::fc, fu::fx);
        self::ft(ev::fd, fu::fx);
        self::ft(ev::fe, fu::fx);
        self::ft(ev::ff, fu::fv);
        self::ft(ev::fg, fu::fv);
        self::ft(ev::fh, fu::fv);
        self::ft(ev::fi, fu::fx);
        self::ft(ev::fj, fu::fx);
        self::ft(ev::fk, fu::fv);
        self::ft(ev::fl, fu::fx);
        self::ft(ev::fm, fu::fx);
        self::ft(ev::fo, fu::fv);
        self::ft(ev::fp, fu::fx);
        self::ft(ev::fq, fu::fv);
        self::ft(ev::fr, fu::fx);
        self::ft(ev::fs, fu::fx);
        self::$e2 = array_fill(0, 256, -1);
        self::$e2[self::e6] = 0x01;
        self::$e2[self::e7] = 0x02;
        self::$e2[self::e8] = 0x03;
        self::$e2[ds::dt] = 0x04;
        self::$e2[ds::dv] = 0x05;
        self::$e2[ds::dw] = 0x06;
        self::$e2[ds::du] = 0x07;
        self::$e2[ds::dx] = 0x08;
        self::$e2[33] = 0x09;
        self::$e2[self::e5] = 0x0B;
        self::$e1 = array_fill(0, 255, -1);
        for ($i = 0; $i <= 128; $i++) {
            $e = self::fy($i);
            if ($e != -1) {
                self::$e1[$e] = $i;
            }
        }
        self::$dh = array_fill(0, 128, -1);
        for ($fz = 0; $fz <= ev::fs; $fz++) {
            self::$dh[self::g0($fz)] = $fz;
        }
        self::$e4 = array_fill(0, 128, -1);
        for ($fz = 0; $fz <= ea::eu; $fz++) {
            self::$e4[self::g1($fz)] = $fz;
        }
    }
    public static function g2($a0)
    {
        $g3 = array_merge(unpack('C*', $a0));
        $g4 = 0;
        for ($fz = 0; $fz < count($g3); $fz++) {
            $g5 = self::fy($g3[$fz]);
            if ($g5 != -1) {
                $g4++;
            }
        }
        if ($g4 == 0) {
            return call_user_func_array("pack", array_merge(array("C*"), $g3));
        }
        $g6 = array_fill(0, count($g3) + $g4, 0);
        for ($fz = 0, $g7 = 0; $fz < count($g3); $fz++, $g7++) {
            $g5 = self::fy($g3[$fz]);
            if ($g5 != -1) {
                $g6[$g7] = self::e8;
                $g6[$g7 + 1] = $g5;
                $g7++;
            } else {
                $g6[$g7] = $g3[$fz];
            }
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g6));
    }
    public static function g8($a0)
    {
        $g3 = array_merge(unpack('C*', $a0));
        $g4 = 0;
        if (count($g3) == 0) {
            return $a0;
        }
        for ($fz = 0; $fz < count($g3); $fz++) {
            if ($g3[$fz] == self::e8) {
                $g4++;
            }
        }
        $g6 = array_fill(0, count($g3) - $g4, 0);
        for ($fz = 0, $g7 = 0; $fz < count($g3); $fz++, $g7++) {
            $g9 = $g3[$fz];
            if ($g9 == self::e8) {
                if ($fz + 1 < count($g3)) {
                    $g6[$g7] = self::ga($g3[$fz + 1]);
                    if ($g6[$g7] == -1) {
                        throw new \InvalidArgumentException();
                    }
                    $fz++;
                } else {
                    throw new \InvalidArgumentException();
                }
            } else {
                $g6[$g7] = $g9;
            }
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g6));
    }
    public static function gb($a0, $gc, $gd)
    {
        $ge = null;
        $gf = strpos($a0, chr(self::g0($gc)));
        $gg = strpos($a0, chr(self::e7), $gf);
        if ($gf !== false && $gg !== false) {
            $gh = substr($a0, $gf + 1, $gg - ($gf + 1));
            switch ($gd) {
                case fu::gi:
                    $ge = $gh;
                    break;
                case fu::fw:
                    $ge = $gh;
                    break;
                case fu::fv:
                    $ge = $gh;
                    break;
                case fu::fx:
                    $ge = self::gj($gh);
                    break;
            }
        }
        return $ge;
    }
    public static function gj($gk)
    {
        $a0 = array_merge(unpack("C*", $gk));
        $g6 = 0;
        $gl = -1;
        $gm = 0;
        $gn;
        $g9;
        $go = count($a0);
        $ad = 0;
        if ($go == 1) {
            return $a0[0];
        } else if ($go == 2 && $a0[$ad] == self::e8) {
            $g9 = self::ga($a0[$ad + 1]);
            if ($g9 != -1) {
                return $g9;
            } else {
                throw new \InvalidArgumentException();
            }
        }
        for (; $go > 0; $go--) {
            $g9 = $a0[$ad];
            $ad++;
            if ($g9 == self::e8) {
                if ($go - 1 < 0) {
                    throw new \InvalidArgumentException();
                }
                $go--;
                $g9 = $a0[$ad];
                $ad++;
                $gn = self::ga($g9);
                if ($gn == -1) {
                    throw new \InvalidArgumentException();
                }
            } else {
                $gn = $g9;
            }
            if ($gl > 0) {
                $gm |= $gn >> $gl;
                $g6 = $g6 << 8 | ($gm >= 0 ? $gm : $gm + 256);
                $gm = ($gn << (8 - $gl));
            } else {
                $gm = ($gn << -$gl);
            }
            $gl = ($gl + 7) % 8;
        }
        return $g6;
    }
    public static function gp($gm)
    {
        if (($gm & 0xFFFFFF80) == 0) {
            $i = self::fy($gm);
            if ($i == -1) {
                return pack('C*', $gm);
            } else {
                return pack('C*', self::e8, $i);
            }
        }
        $gq = 0;
        if (($gm & 0xFF000000) != 0) {
            $gq = 24;
        } else if (($gm & 0x00FF0000) != 0) {
            $gq = 16;
        } else {
            $gq = 8;
        }
        $g6 = array_fill(0, 10, 0);
        $gr = 0;
        $gs = 0;
        while ($gq >= 0) {
            $b = (($gm >> $gq) & 0xFF);
            $gs++;
            $g6[$gr] |= ($b >= 0 ? $b : $b + 256) >> $gs;
            $g5 = self::fy($g6[$gr]);
            if ($g5 != -1) {
                $g6[$gr] = self::e8;
                $g6[$gr + 1] = $g5;
                $gr++;
            }
            $gr++;
            $g6[$gr] |= ($b << (7 - $gs)) & 0x7F;
            $gq -= 8;
        }
        $g5 = self::fy($g6[$gr]);
        if ($g5 != -1) {
            $g6[$gr] = self::e8;
            $g6[$gr + 1] = $g5;
            $gr++;
        }
        $gr++;
        if ($gr < count($g6)) {
            $g6 = array_slice($g6, 0, $gr);
        }
        return call_user_func_array("pack", array_merge(array("C*"), $g6));
    }
    public static function ga($b)
    {
        return $b >= 0 ? self::$e1[$b] : -1;
    }
    public static function fy($b)
    {
        return $b >= 0 ? self::$e2[$b] : -1;
    }
    public static function g0($h)
    {
        return self::$e0[$h];
    }
    public static function gt($g9)
    {
        return self::$dh[$g9];
    }
    public static function g1($o)
    {
        return self::$dz[$o];
    }
    public static function di($g9)
    {
        return self::$e4[$g9];
    }
    public static function gu()
    {
        return self::e5;
    }
    public static function ft($gv, $gw)
    {
        self::$e3[dy::g0($gv)] = $gw;
    }
    public static function gx($gv)
    {
        $gy = self::g0($gv);
        return self::$e3[$gy];
    }
}
class ea
{
    const eb = 0;
    const ec = 1;
    const ed = 2;
    const ee = 3;
    const ef = 4;
    const eg = 5;
    const eh = 6;
    const ei = 7;
    const eq = 8;
    const ej = 9;
    const ek = 10;
    const el = 11;
    const em = 12;
    const en = 13;
    const ep = 14;
    const eo = 15;
    const c8 = 16;
    const er = 17;
    const es = 18;
    const et = 19;
    const eu = 20;
}
class ev
{
    const ew = 0;
    const ex = 1;
    const ey = 2;
    const ez = 3;
    const f0 = 4;
    const f1 = 5;
    const f2 = 6;
    const f3 = 7;
    const f4 = 8;
    const f5 = 9;
    const f6 = 10;
    const f7 = 11;
    const f8 = 12;
    const f9 = 13;
    const fa = 14;
    const fb = 15;
    const fc = 16;
    const fd = 17;
    const fe = 18;
    const ff = 19;
    const fg = 20;
    const fh = 21;
    const fi = 22;
    const fj = 23;
    const fk = 24;
    const fl = 25;
    const fm = 26;
    const fo = 27;
    const fp = 28;
    const fq = 29;
    const fr = 30;
    const fs = 31;
}
class fu
{
    const gi = 0;
    const fw = 1;
    const fv = 2;
    const fx = 3;
}
class gz
{
    const h0 = "1";
    const h1 = "2";
    const h2 = "3";
    const h3 = "4";
}
class h4
{
    const h5 = 4;
    const h6 = 8;
}
class h7
{
    const h8 = "d";
    const h9 = "a";
}
class ha
{
	const hb = 0;
	const hc = 1;
	const hd = 2;
	const he = 3;
}
dy::e9();
class hf implements c
{
	private $hg = "POST / HTTP/1.1";
	private $hh = "Host: ";
	private $hi = "Content-Length: ";
	private $hj = "00000";
	private $hk = "\r\n";
	public function __construct()
	{
	}
	public function d($e, $f)
	{
		$h = new z();
		$h->a8($this->hg);
		$h->a8($this->hk);
		$h->a8($this->hh);
		$h->a8(dy::g2($e));
		$h->a8($this->hk);
		foreach($f as $name => $value) {
			$h->a8($name);
			$h->a8(": ");
			$h->a8($value);
			$h->a8($this->hk);
		}
		$h->a8($this->hi);
		$h->ag();
		$h->a8($this->hj);
		$h->a8($this->hk);
		$h->a8($this->hk);
		$h->ah();
		return $h;
	}
	public function g($h)
	{
		$ad = $h->ar();
		$hl = strval($ad - $h->al());
		if (strlen($hl) <= strlen($this->hj)) {
			$b2 = 0;
			for ($fz = strlen($this->hj) - strlen($hl); $fz < strlen($this->hj); $fz++) {
				$h->ac($h->ak() + $fz, $hl[$b2]);
				$b2++;
			}
		} else {
			$hm = substr($h->ap(), 0, $h->ak());
			$hm .= $hl;
			$hm .= substr($h->ap(), $h->ak() + strlen($this->hj));
			$h->ao($hm);
		}
	}
	public function i($e, $j, $f)
	{
		return "";
	}
}
class hn implements c
{
	private $ho = "GET /WebSocketConnection HTTP/1.1";
	private $hp = "GET /WebSocketConnection-Secure HTTP/1.1";
	private $hh = "Host: ";
	private $hq = "Origin: ";
	private $hr = "Upgrade: websocket";
	private $hs = "Sec-WebSocket-Key: ";
	private $ht = "Sec-WebSocket-Version: 13";
	private $hu = "Sec-WebSocket-Protocol: pushv1";
	private $hv = "Connection: Upgrade";
	private $hk = "\r\n";
	private $hw = 10;
	private $hx = -128;
	private $hy = -128;
	private $hz = 0x02;
	public function __construct()
	{
	}
	public function d($e, $f)
	{
		$h = new z();
		for ($fz = 0; $fz < $this->hw; $fz++) {
			$h->a8(chr(0x00));
		}
		for ($fz = 0; $fz < 4; $fz++) {
			$i0 = chr(rand(0, 100));
			$h->a8($i0);
			$h->a9($i0);
		}
		$h->ai();
		return $h;
	}
	public function g($h)
	{
		$i1 = chr($this->hx) | chr($this->hz);
		$h->aj();
		$i2 = $h->an() - $h->am();
		$i3 = $this->i4($i2);
		$i5 = $this->i6($i2, $i3);
		$i7 = 0;
		if ($i3 === 1) {
			$i7 = 8;
			$h->ac($i7, $i1);
			$h->ac($i7 + 1, $i5[0] | chr($this->hy));
		} else if ($i3 === 2) {
			$i7 = 6;
			$h->ac($i7, $i1);
			$h->ac($i7 + 1, chr(126) | chr($this->hy));
			for ($fz = 0; $fz <= 1; $fz++) {
				$h->ac($i7 + 2 + $fz, $i5[$fz]);
			}
		} else {
			$h->ac($i7, $i1);
			$h->ac($i7 + 1, chr(127) | chr($this->hy));
			for ($fz = 0; $fz <= 7; $fz++) {
				$h->ac($i7 + 2 + $fz, $i5[$fz]);
			}
		}
		$h->a5($i7);
	}
	public function i($e, $j, $f)
	{
		$h = new z();
		if (!$j) {
			$h->a8($this->ho);
		} else {
			$h->a8($this->hp);
		}
		$h->a8($this->hk);
		if (!$j) {
			$h->a8($this->hq);
			$h->a8("http://" . $e);
		} else {
			$h->a8($this->hq);
			$h->a8("https://" . $e);
		}
		$h->a8($this->hk);
		$h->a8($this->hh);
		$h->a8($e);
		$h->a8($this->hk);
		$h->a8($this->hr);
		$h->a8($this->hk);
		$h->a8($this->hv);
		$h->a8($this->hk);
		foreach($f as $name => $value) {
			$h->a8($name);
			$h->a8(": ");
			$h->a8($value);
			$h->a8($this->hk);
		}
		$h->a8($this->hs);
		$h->a8($this->i8());
		$h->a8($this->hk);
		$h->a8($this->ht);
		$h->a8($this->hk);
		$h->a8($this->hu);
		$h->a8($this->hk);
		$h->a8($this->hk);
		return $h;
	}
	private function i4($i9)
	{
		if ($i9 <= 125) {
			return 1;
		} else if ($i9 <= 65535) {
			return 2;
		}
		return 8;
	}
	private function i6($ae, $i3)
	{
		$h = "";
		$ia = 8 * $i3 - 8;
		for ($fz = 0; $fz < $i3; $fz++) {
			$ib = $this->ic($ae, $ia - 8 * $fz);
			$id = $ib - (256 * intval($ib / 256));
			$h .= chr($id);
		}
		return $h;
	}
	private function ic($gm, $ie)
	{
		return ($gm % 0x100000000) >> $ie;
	}
	private function i8() 
	{
		$key = '';
        for ($i = 0; $i < 16; $i++) {
            $key .= chr(rand(33, 126));
        }
        return base64_encode($key);
	}
}
class ig
{
    private $f0 = h4::h6;
    private $ih = MigratoryDataClient::TRANSPORT_WEBSOCKET;
    public function __construct()
    {
    }
    public function ii()
    {
        $this->ih = MigratoryDataClient::TRANSPORT_HTTP;
        $this->f0 = h4::h5;
    }
    public function ij($h, $ik, $il, $im, $in)
    {
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a8(chr(dy::g1(ea::es)));
        } else {
            $h->a8(chr(dy::g1(ea::es)) ^ $h->aa());
        }
        if (strlen($ik) > 0) {
            $h->a8($this->io(dy::g0(ev::f9), dy::g2($ik), $h));
        }
        $h->a8($this->io(dy::g0(ev::fi), dy::gp($il), $h));
        $h->a8($this->io(dy::g0(ev::fh), dy::g2($in), $h));
        $h->a8($this->io(dy::g0(ev::fp), dy::gp($im), $h));
        $h->a8($this->io(dy::g0(ev::f0), dy::gp($this->f0), $h));
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a8(chr(dy::e6));
        } else {
            $h->a8(chr(dy::e6) ^ $h->aa());
        }
    }
    public function ip($h, $k, $iq)
    {
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a8(chr(dy::g1(ea::eb)));
        } else {
            $h->a8(chr(dy::g1(ea::eb)) ^ $h->aa());
        }
        $h->a8($this->io(dy::g0(ev::ew), dy::g2($k->d1()), $h));
        if (isset($iq) && $iq >= 0) {
            $h->a8($this->io(dy::g0(ev::f1), dy::gp($iq), $h));
        }
        $ir = $k->d9();
        switch ($ir) {
            case cv::cw:
                break;
            case cv::db:
                $h->a8($this->io(dy::g0(ev::fm), dy::gp($k->d2()), $h));
                break;
            case cv::dc:
                $h->a8($this->io(dy::g0(ev::ez), dy::gp($k->cz()), $h));
                $h->a8($this->io(dy::g0(ev::ey), dy::gp($k->cx() + 1), $h));
                break;
        }
        $h->a8($this->io(dy::g0(ev::f0), dy::gp($this->f0), $h));
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a8(chr(dy::e6));
        } else {
            $h->a8(chr(dy::e6) ^ $h->aa());
        }
    }
    public function is($h, $iq, $k)
    {
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a8(chr(dy::g1(ea::ec)));
        } else {
            $h->a8(chr(dy::g1(ea::ec)) ^ $h->aa());
        }
        $h->a8($this->io(dy::g0(ev::ew), dy::g2($k), $h));
        if ($iq > 0) {
            $h->a8($this->io(dy::g0(ev::f1), dy::gp($iq), $h));
        }
        $h->a8($this->io(dy::g0(ev::f0), dy::gp($this->f0), $h));
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a8(chr(dy::e6));
        } else {
            $h->a8(chr(dy::e6) ^ $h->aa());
        }
    }
    public function it($h, $iq)
    {
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a8(chr(dy::g1(ea::ec)));
        } else {
            $h->a8(chr(dy::g1(ea::ec)) ^ $h->aa());
        }
        if ($iq > 0) {
            $h->a8($this->io(dy::g0(ev::f1), dy::gp($iq), $h));
        }
        $h->a8($this->io(dy::g0(ev::f0), dy::gp($this->f0), $h));
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a8(chr(dy::e6));
        } else {
            $h->a8(chr(dy::e6) ^ $h->aa());
        }
    }
    public function iu($h, $iq, $iv)
    {
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a8(chr(dy::g1(ea::eu)));
        } else {
            $h->a8(chr(dy::g1(ea::eu)) ^ $h->aa());
        }
        if ($iq > 0) {
            $h->a8($this->io(dy::g0(ev::f1), dy::gp($iq), $h));
        }
        if (strlen($iv) > 0) {
            $h->a8($this->io(dy::g0(ev::f9), dy::g2($iv), $h));
        }
        $h->a8($this->io(dy::g0(ev::f0), dy::gp($this->f0), $h));
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a8(chr(dy::e6));
        } else {
            $h->a8(chr(dy::e6) ^ $h->aa());
        }
    }
    public function iw($h, $bs, $ix)
    {
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a8(chr(dy::g1(ea::eo)));
        } else {
            $h->a8(chr(dy::g1(ea::eo)) ^ $h->aa());
        }
        $h->a8($this->io(dy::g0(ev::ew), dy::g2($bs->getSubject()), $h));
        $a0 = $bs->getContent();
        if ($bs->isCompressed()) {
            if ($bs->getCompressionAlgorithm() == CompressionAlgorithm::ZLIB_BASE64) {
                $a0 = $this->iy($bs->getContent());
            } else if ($bs->getCompressionAlgorithm() == CompressionAlgorithm::ZLIB_BINARY) {
                $a0 = $this->iz($bs->getContent());
            }
            if (strlen($a0) < strlen($bs->getContent())) {
                $h->a8($this->io(dy::g0(ev::ex), dy::g2($a0), $h));
            } else {
                $h->a8($this->io(dy::g0(ev::ex), dy::g2($bs->getContent()), $h));
                $bs->setCompressed(false);
            }
        } else {
            $h->a8($this->io(dy::g0(ev::ex), dy::g2($bs->getContent()), $h));
        }
        $n = $bs->getReplySubject();
        if (strlen($n) > 0) {
            $h->a8($this->io(dy::g0(ev::fo), dy::g2($n), $h));
        }
        $m = $bs->getClosure();
        if (strlen($m) > 0) {
            $h->a8($this->io(dy::g0(ev::fk), dy::g2($m), $h));
        }
        $h->a8($this->io(dy::g0(ev::f1), dy::gp($ix), $h));
        if ($bs->getQos() == QoS::GUARANTEED) {
            $h->a8($this->io(dy::g0(ev::fe), dy::gp(QoS::GUARANTEED), $h));
        } else {
            $h->a8($this->io(dy::g0(ev::fe), dy::gp(QoS::STANDARD), $h));
        }
        if ($bs->isRetained() == true) {
            $h->a8($this->io(dy::g0(ev::fd), dy::gp(1), $h));
        } else {
            $h->a8($this->io(dy::g0(ev::fd), dy::gp(0), $h));
        }
        if ($bs->isCompressed()) {
            $h->a8($this->io(dy::g0(ev::fs), dy::gp($bs->getCompressionAlgorithm()), $h));
        }
        $h->a8($this->io(dy::g0(ev::f0), dy::gp($this->f0), $h));
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $h->a8(chr(dy::e6));
        } else {
            $h->a8(chr(dy::e6) ^ $h->aa());
        }
    }
    private function io($ge, $a0, $h)
    {
        $g6 = '';
        if ($this->ih == MigratoryDataClient::TRANSPORT_HTTP) {
            $g6 .= chr($ge);
            $g6 .= $a0;
            $g6 .= chr(dy::e7);
        } else {
            $g6 .= chr($ge) ^ $h->aa();
            for ($fz = 0; $fz < strlen($a0); $fz++) {
                $g6 .= $a0[$fz] ^ $h->aa();
            }
            $g6 .= chr(dy::e7) ^ $h->aa();
        }
        return $g6;
    }
    public function iy($l)
    {
        $j0 = gzdeflate($l);
        if ($j0 === false) {
            return $l;
        }
        $j1 = base64_encode($j0);
        return $j1;
    }
    public function iz($l)
    {
        $j0 = gzdeflate($l);
        if ($j0 === false) {
            return $l;
        }
        return $j0;
    }
    public function j2($a0)
    {
        $j3 = base64_decode($a0);
        if ($j3 === false) {
            return $a0;
        }
        $j4 = gzinflate($j3);
        if ($j4 === false) {
            return $a0;
        }
        return $j4;
    }
    public function j5($a0)
    {
        $j4 = gzinflate($a0);
        if ($j4 === false) {
            return $a0;
        }
        return $j4;
    }
}
class j6
{
    const j7 = 80;
    const j8 = 443;
    const j9 = 100;
    private $e;
    private $ax;
    private $ja;
    private $jb = self::j9;
    public function __construct($jc, $jd)
    {
        $this->ja = $jc;
        $je = explode(" ", $jc, 2);
        if (count($je) == 2) {
            $jb = intval($je[0]);
            if ($jb <= 0 || $jb > 100) {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "the weight of a cluster member must be between 0 and 100, weight: " . $jb);
            }
            $this->jb = intval($je[0]);
            $jc = $je[1];
        }
        $jf = strrpos($jc, '/');
        $jg = $jf === false ? $jc : substr($jc, $jf + 1);
        $jh = strrpos($jg, ':');
        if ($jh !== false) {
            $this->e = substr($jg, 0, $jh);
            $this->ax = intval(substr($jg, $jh + 1));
            if ($this->ax < 0 || $this->ax > 65535) {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $jc . " - invalid port number");
            }
            if ($this->e === "") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "Cluster member with null address");
            }
            if ($this->e === "*") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $jc . " - wildcard address (*) cannot be used to define a cluster member");
            }
        } else {
            $this->e = $jg;
            if ($this->e === "") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, "Cluster member with null address");
            }
            if ($this->e === "*") {
                throw new MigratoryDataException(MigratoryDataException::E_INVALID_URL, $jc . " - wildcard address (*) cannot be used to define a cluster member");
            }
            if ($jd === false) {
                $this->ax = self::j7;
            } else {
                $this->ax = self::j8;
            }
        }
    }
    public function ji()
    {
        return $this->e;
    }
    public function jj()
    {
        return $this->ax;
    }
    public function jk()
    {
        return $this->ja;
    }
    public function jl()
    {
        return $this->jb;
    }
    public function jm($jn)
    {
        if ($this->ji() === $jn->ji()) {
            if ($this->jj() === $jn->jj()) {
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
            $this->ax .
            "]";
    }
}
class jo
{
    private $jp = array();
    private $jq = array();
    private $jr = null;
    public function __construct($js, $jd)
    {
        foreach ($js as $jt) {
            $this->jp[] = new j6($jt, $jd);
        }
    }
    public function ju()
    {
        $jv = $this->jw();
        if (count($jv) === 0) {
            $this->jq = array();
            $jv = $this->jp;
        }
        $jx = $this->jy($jv);
        $this->jr = $jv[$jx];
        return $this->jr;
    }
    public function jz($jn)
    {
        array_push($this->jq, $jn);
    }
    public function bi()
    {
        return $this->jr;
    }
    private function jw()
    {
        $jv = array();
        foreach ($this->jp as $jn) {
            $k0 = true;
            foreach ($this->jq as $k1) {
                if ($jn->jm($k1)) {
                    $k0 = false;
                }
            }
            if ($k0) {
                array_push($jv, $jn);
            }
        }
        return $jv;
    }
    private function jy($jv)
    {
        $jx = -1;
        $k2 = 0;
        foreach ($jv as $jn) {
            $k2 = $k2 + $jn->jl();
        }
        if ($k2 === 0) {
            $jx = floor(count($jv) * (mt_rand() / mt_getrandmax()));
        } else {
            $jb = floor($k2 * (mt_rand() / mt_getrandmax()));
            $k2 = 0;
            $fz = 0;
            foreach ($jv as $jn) {
                $k2 = $k2 + $jn->jl();
                if ($k2 > $jb) {
                    $jx = $fz;
                    break;
                }
                $fz++;
            }
        }
        return $jx;
    }
}
class k3 extends MigratoryDataMessage
{
    public function __construct($k, $l, $t, $m = "", $o = QoS::GUARANTEED, $p = true, $n = "", $s = false)
    {
        parent::__construct($k, $l, $m, $o, $p, $n);
        $this->t = $t;
        $this->s = $s;
    }
    public function cy($q)
    {
        $this->q = $q;
    }
    public function cx()
    {
        return $this->q;
    }
    public function k4($r)
    {
        $this->r = $r;
    }
    public function k5()
    {
        return $this->r;
    }
}
class x
{
    const k6 = "NOT_SUBSCRIBED";
    const k7 = "OK";
    const k8 = "FAILED";
    const k9 = "DENY";
    const bf = "connection_passive_close";
    const ka = "connection_active_close_keep_alive";
    const kb = "connection_active_close_seq_higher";
    const bk = "connection_error";
    const ct = "cache_ok";
    const kc = "cache_ok_no_new_message";
    const kd = "cache_ok_new_epoch";
    const ke = "no_cache";
    const kf = "no_seq";
    const kg = "end";
    const kh = '/^\/([^\/]+\/)*([^\/]+|\*)$/';
    const ki = "\r\n\r\n";
    const hi = "Content-Length: ";
    public static function kj($gh)
    {
        return preg_match(self::kh, $gh);
    }
    public static function kk($kl)
    {
        $km = array();
        foreach ($kl as $k) {
            if (isset($k) && x::kj($k)) {
                array_push($km, $k);
            }
        }
        return $km;
    }
    public static function kn($ko, $kp, $kq, $kr, $b1)
    {
        // different epoch, reset and continue.
        if ($ko->cz() !== $kq) {
            $ko->cy($kp);
            $ko->d0($kq);
            return ks::kt;
        }
        // if received seq is equal or smaller than the local seq then the message is ignored
        if ($kp <= $ko->cx()) {
            return ks::ku;
        }
        // if received seq is +1 than the local seq then the message is processed
        if ($kp === ($ko->cx() + 1)) {
            if ($ko->cu() == cv::dc) {
                $ko->dd();
                $kr->onStatus(MigratoryDataClient::NOTIFY_DATA_SYNC, $ko->d1());
                $b1->bt(c0::c6 . MigratoryDataClient::NOTIFY_DATA_SYNC . $ko);
            }
            $ko->cy($ko->cx() + 1);
            return ks::kt;
        }
        // there is a hole in the order of the messages
        // if there is a missing message when the session is active, then we disconnect the client and make failover.
        if ($ko->cr() > 0) {
            $b1->bt("Missing messages: expected message with sequence number: " . ($ko->cx() + 1) . ", received instead message with sequence number:  " . $kp . " !");
            return ks::kv;
        }
        $b1->bt("Reset sequence: '" . ($ko->cx() + 1) . "'. The new sequence is: '" . $kp . "' !");
        $ko->cy($kp);
        $kr->onStatus(MigratoryDataClient::NOTIFY_DATA_RESYNC, $ko->d1());
        $b1->bt(c0::c6 . MigratoryDataClient::NOTIFY_DATA_RESYNC . " " . $ko);
        return ks::kt;
    }
    public static function kw($ko, $kp, $kq, $kr, $b1)
    {
        // different epoch, reset and continue.
        if ($ko->cz() !== $kq) {
            $ko->cy($kp);
            $ko->d0($kq);
            return ks::kt;
        }
        // if received seq is equal or smaller than the local seq then the message is ignored
        if ($kp <= $ko->cx()) {
            return ks::ku;
        }
        if ($ko->cu() == cv::dc) {
            $ko->dd();
        }
        $ko->cy($kp);
        return ks::kt;
    }
    public static function kx($ky)
    {
        $kz = "";
        if (count($ky) > 0) {
            $kz .= "[";
            for ($fz = 0; $fz < count($ky); $fz++) {
                $kz .= $ky[$fz];
                if ($fz + 1 != count($ky)) {
                    $kz .= ", ";
                }
            }
            $kz .= "]";
        }
        return $kz;
    }
    public static function y($l0)
    {
        if ($l0) {
            return "true";
        }
        return "false";
    }
}
class l1
{
    private $l2 = array();
    public function l3($kl, $cn)
    {
        foreach ($kl as $k) {
            if (!array_key_exists($k, $this->l2)) {
                $ko = new cl($k, $cn);
                $this->l2[$k] = $ko;
            }
        }
    }
    public function l4($kl)
    {
        $l5 = array();
        foreach ($kl as $k) {
            if (array_key_exists($k, $this->l2)) {
                unset($this->l2[$k]);
                array_push($l5, $k);
            }
        }
        return $l5;
    }
    public function l6()
    {
        return array_keys($this->l2);
    }
    public function d1($k)
    {
        if (array_key_exists($k, $this->l2)) {
            return $this->l2[$k];
        }
        return null;
    }
    public function l7($k)
    {
        return array_key_exists($k, $this->l2);
    }
    public function l8()
    {
        $l9 = array_values($this->l2);
        foreach ($l9 as $la) {
            $la->de();
        }
    }
}
class lb
{
    private $lc;
    private $ld;
    public function __construct($lc, $ld)
    {
        $this->lc = $lc;
        $this->ld = $ld;
    }
    public function le()
    {
        return $this->lc;
    }
    public function lf()
    {
        return $this->ld;
    }
}
class lg
{
    public static function lh($h)
    {
        $li = lg::lj($h, 0);
        $ad = $li->le();
        if ($h->ar() < $li->lf()) {
            $ad = -1;
        }
        if ($ad === -1) {
            return $ad;
        }
        while (ord($h->af($ad)) === dy::e6) {
            $ad++;
        }
        return $ad;
    }
    public static function lj($h, $a5)
    {
        $lk = new lb(-1, -1);
        if ($a5 == $h->ar()) {
            return $lk;
        }
        $ad = $a5;
        $ll = 2;
        $lm = 0;
        $ln = 0;
        $lo = $h->ar() - $ad;
        if ($lo < $ll) {
            return $lk;
        }
        $g9 = dy::gj($h->af($ad));
        $i1 = ($g9 >> 7) & 0x01;
        $lp = $g9 & 0x40;
        $lq = $g9 & 0x20;
        $lr = $g9 & 0x10;
        if ($i1 !== 1 || $lp != 0 || $lq != 0 || $lr != 0) {
            return $lk;
        }
        $ad++;
        $g9 = dy::gj($h->af($ad));
        $ls = $g9 & 0x7F;
        if ($ls < 126) {
            $ln = 0;
            $lm = $ls;
        } else if ($ls === 126) {
            $ln = 2;
            if ($lo < $ll + $ln) {
                return $lk;
            }
            $lt = "";
            for ($fz = $ad + 1; $fz <= $ad + $ln; $fz++) {
                $lt .= $h->af($fz);
            }
            $lm = lg::lu($lt);
            $ad += $ln;
        } else {
            $ln = 8;
            if ($lo < $ll + $ln) {
                return $lk;
            }
            $lt = "";
            for ($fz = $ad + 1; $fz <= $ad + $ln; $fz++) {
                $lt .= $h->af($fz);
            }
            $lm = lg::lu($lt);
            $ad += $ln;
        }
        if ($lo < ($ll + $ln + $lm)) {
            return $lk;
        }
        $ad += 1;
        return new lb($ad, $ad + $lm);
    }
    private static function lu($a0)
    {
        if (strlen($a0) === 2) {
            return (ord($a0[0] & chr(0xFF)) << 8) | ord($a0[1] & chr(0xFF));
        } else {
            $lv = ord($a0[4] & chr(0x7F)) << 24;
            $lw = ord($a0[5] & chr(0xFF)) << 16;
            $lx = ord($a0[6] & chr(0xFF)) << 8;
            $ly = ord($a0[7] & chr(0xFF));
            $lz = $lv | $lw | $lx | $ly;
            return $lz;
        }
    }
}
class m0
{
    public static function m1($h)
    {
        $m2 = $h->ab();
        if ($h->af($m2) == "H") {
            $m2 = self::m3($h);
        }
        if ($m2 == -1) {
            return array();
        }
        $h->a5($m2);
        $m4 = array();
        while (true) {
            if ($m2 >= $h->ar()) {
                return $m4;
            }
            if (dy::gj($h->af($m2)) == dy::gu()) {
                $m2++;
            } else {
                $li = lg::lj($h, $m2);
                $m5 = $li->le();
                $m6 = $li->lf();
                if ($m5 == -1) {
                    return $m4;
                }
                while (true) {
                    $fz = self::m7($h, $m5, $m6, chr(dy::e6));
                    if ($fz == -1) {
                        break;
                    }
                    $dh = self::m8($h, $m5 + 1, $fz);
                    if ($dh != null) {
                        $m9 = new df(dy::di(ord($h->af($m5))), $dh);
                        array_push($m4, $m9);
                    }
                    $m5 = $fz + 1;
                    $h->a5($m5);
                }
                $m2 = $h->ab();
            }
        }
    }
    public static function ma($h)
    {
        $m2 = m0::mb($h);
        if ($m2 == -1) {
            return array();
        }
        $h->a5($m2);
        $m4 = array();
        $ad = $h->ab();
        while (true) {
            $fz = self::m7($h, $ad, $h->ar(), chr(dy::e6));
            if ($fz == -1) {
                break;
            }
            $mc = $h->af($ad);
            if ($mc == "H") {
                $md = m0::ma($h);
                foreach ($md as $me) {
                    array_push($m4, $me);
                }
                break;
            }
            $dh = m0::m8($h, $ad + 1, $fz);
            $m9 = new df(dy::di(ord($h->af($ad))), $dh);
            array_push($m4, $m9);
            $ad = $fz + 1;
            $h->a5($ad);
        }
        return $m4;
    }
    public static function m8($h, $lc, $ld)
    {
        $dh = null;
        while (true) {
            if ($lc >= $ld) {
                break;
            }
            $gv = ord($h->af($lc));
            $mf = self::m7($h, $lc + 1, $ld, chr(dy::e7));
            if ($mf == -1) {
                return null;
            }
            $ge = dy::gt($gv);
            if ($ge === null) {
                $lc = $mf + 1;
                continue;
            }
            $lc++;
            if ($dh == null) {
                $dh = array();
            }
            $ae = null;
            $mg = substr($h->ap(), $lc, $mf - $lc);
            switch (dy::gx($ge)) {
                case fu::fx:
                    $ae = dy::gj($mg);
                    break;
                case fu::fv:
                    $ae = dy::g8($mg);
                    break;
                case fu::fw:
                    $ae = dy::g8($mg);
                    break;
                case fu::gi:
                    $ae = $mg;
                    break;
            }
            if (!array_key_exists($ge, $dh)) {
                $dh[$ge] = $ae;
            } else {
                $mh = $dh[$ge];
                if (is_array($mh)) {
                    array_push($mh, $ae);
                } else {
                    $mi = array();
                    array_push($mi, $mh);
                    array_push($mi, $ae);
                    $dh[$ge] = $mi;
                }
            }
            $lc = $mf + 1;
        }
        return $dh;
    }
    public static function mb($h)
    {
        $mj = $h->ab();
        $a0 = $h->aq();
        $mk = dy::g2(x::hi);
        $ad = m0::ml($mk, $a0);
        if ($ad == -1) {
            return -1;
        }
        $ad += strlen($mk);
        $mm = "\r";
        $mn = m0::m7($h, $ad, $h->ar(), $mm);
        if ($mn == -1) {
            return -1;
        }
        $mo = substr($a0, $ad, $mn - $ad);
        $mp = intval($mo);
        $ad = m0::ml(x::ki, $a0);
        if ($ad == -1) {
            return $ad;
        }
        $ad += strlen(x::ki);
        if (($ad + $mp) > strlen($a0)) {
            return -1;
        }
        return $mj + $ad;
    }
    private static function m7($h, $lc, $ld, $mq)
    {
        for ($fz = $lc; $fz < $ld; $fz++) {
            $x = $h->af($fz);
            if ($h->af($fz) == $mq) {
                return $fz;
            }
        }
        return -1;
    }
    private static function ml($mr, $ms)
    {
        $me = strlen($mr);
        $ie = strlen($ms);
        $mt = array_fill(0, $me, 0);
        m0::mu($mr, $me, $mt);
        $fz = 0;
        $g7 = 0;
        while ($fz < $ie) {
            if ($mr[$g7] == $ms[$fz]) {
                $g7++;
                $fz++;
            }
            if ($g7 == $me) {
                return $fz - $g7;
            } else if ($fz < $ie && $mr[$g7] != $ms[$fz]) {
                if ($g7 != 0)
                    $g7 = $mt[$g7 - 1];
                else
                    $fz = $fz + 1;
            }
        }
        return -1;
    }
    private static function mu($mr, $me, &$mt)
    {
        $go = 0;
        $mt[0] = 0;
        $fz = 1;
        while ($fz < $me) {
            if ($mr[$fz] == $mr[$go]) {
                $go++;
                $mt[$fz] = $go;
                $fz++;
            } else {
                if ($go != 0) {
                    $go = $mt[$go - 1];
                } else {
                    $mt[$fz] = 0;
                    $fz++;
                }
            }
        }
    }
    private static function m3($h)
    {
        $mv = "\r\n\r\n";
        $ad = $h->ab();
        $fz = self::ml($mv, $h->aq());
        if ($fz == -1) {
            return -1;
        }
        $ad = $fz + strlen($mv);
        return $ad;
    }
}
class Version
{
	const VERSION = 7;
}
class mw
{
    private $b2 = null;
    private $e = null;
    private $mx = null;
    private $ay = null;
    private $kr = null;
    private $my = false;
    private $mz = false;
    private $az = null;
    private $n0 = n1::n2;
    private $n3 = null;
    private $n4 = null;
    private $n5 = null;
    private $iq = -1;
    private $n6 = false;
    private $n7 = 0;
    private $n8 = false;
    private $n9 = 0;
    private $na = nb::nc;
    private $nd = null;
    private $ne = null;
    private $nf = array();
    private $ng = null;
    private $nh;
    private $b1 = null;
    public function __construct($ni, $mx, $ay, $kr, $b1)
    {
        $this->b2 = $ni;
        $this->mx = $mx;
        $this->ay = $ay;
        $this->kr = $kr;
        $this->b1 = $b1;
        $this->az = new nj($this->b2, $this);
        $this->nh = new l1();
        $this->n4 = new ig();
        if ($ni->nk() === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            $this->n3 = new hn();
        } else {
            $this->n3 = new hf();
            $this->n4->ii();
        }
    }
    public function nl()
    {
        $this->ng = uniqid();
        $nm = $this->mx->ju();
        $this->b1->bg("Connecting to the cluster member: " . $nm . ", using API version: " . Version::VERSION);
        $this->n5 = new av($this, $nm->ji(), $nm->jj(), $this->az, $this->ng, $this->b1);
        $this->n5->b7();
    }
    public function bc()
    {
        if ($this->b2->nk() !== MigratoryDataClient::TRANSPORT_HTTP) {
            $h = $this->n3->i($this->mx->bi()->ji(), $this->b2->bb(), $this->b2->nn());
            $this->n5->bl($h->aq());
        }
        $this->az->no($this->ng, np::es);
        $this->az->nq();
        $this->nr();
    }
    public function nr()
    {
        $h = $this->n3->d($this->mx->bi()->ji(), $this->b2->nn());
        $this->n4->ij($h, $this->b2->ns(), $this->b2->nt(), $this->b2->nu(), $this->b2->nv());
        $this->n3->g($h);
        $this->n5->bl($h->aq());
    }
    public function be($b0, $nw, $nx)
    {
        if ($b0 === $this->ng) {
            $this->my = false;
            $this->b1->bt(c0::c5 . $this->ng . " " . $nx);
            $this->ny();
            $this->nz();
            $this->az->be($this->ng, x::bf);
        }
    }
    public function o0($kl, $cn)
    {
        if (!isset($kl) || count($kl) == 0) {
            return;
        }
        $kl = x::kk($kl);
        $o1 = array_diff($kl, $this->nh->l6());
        if (count($o1) == 0) {
            return 0;
        }
        $this->nh->l3($o1, $cn);
        if ($this->my) {
            $this->o2($o1);
        }
    }
    private function o2($kl)
    {
        $h = $this->n3->d($this->mx->bi()->ji(), $this->b2->nn());
        foreach ($kl as $k) {
            $this->o3($h, $this->nh->d1($k));
        }
        $this->n3->g($h);
        $this->n5->bl($h->aq());
    }
    private function o3($h, $k)
    {
        $this->n4->ip($h, $k, $this->iq);
    }
    public function o4($kl)
    {
        if (!isset($kl) || count($kl) == 0) {
            return;
        }
        $o5 = array_intersect($kl, $this->nh->l6());
        if (count($o5) == 0) {
            return;
        }
        $l5 = $this->nh->l4($o5);
        if ($this->my) {
            $this->o6($l5);
        }
    }
    private function o6($kl)
    {
        $h = $this->n3->d($this->mx->bi()->ji(), $this->b2->nn());
        foreach ($kl as $k) {
            $this->n4->is($h, $this->iq, $k);
        }
        $this->n3->g($h);
        $this->n5->bl($h->aq());
    }
    public function o7()
    {
        $this->ny();
        if ($this->n0 == n1::o8) {
            return;
        }
        $this->mx->jz($this->mx->bi());
        $this->mz = true;
        $this->nl();
    }
    public function ny()
    {
        $this->az->o9();
        $this->de();
        if (isset($this->n5)) {
            $this->n5->bm();
        }
        $this->n5 = null;
    }
    private function de()
    {
        $this->my = false;
        $this->iq = -1;
        $this->n8 = false;
    }
    public function oa()
    {
        $this->n0 = n1::o8;
        $this->ny();
    }
    public function ob($iv) {
        $h = $this->n3->d($this->mx->bi()->ji(), $this->b2->nn());
        $this->n4->iu($h, $this->iq, $iv);
        $this->n3->g($h);
        $this->n5->bl($h->aq());        
    }
    public function oc($bs)
    {
        if (!$this->my) {
            $this->od(MigratoryDataClient::NOTIFY_PUBLISH_FAILED, $bs);
            return;
        }
        $this->oe($bs);
    }
    public function oe($bs)
    {
        $n = $bs->getReplySubject();
        if (strlen($n) > 0 && x::kj($n) && !$this->nh->l7($n)) {
            $this->o0(array($n), 0);
        }
        if ($bs->getCompressionAlgorithm() == CompressionAlgorithm::ZLIB_BINARY && $this->b2->of() == 0) {
            $this->b1->bu("ZLIB_BINARY compression ignored: this feature requires MigratoryData Server version 6.0.22 or newer. The message will be sent uncompressed.");
            $bs->setCompressionAlgorithm(CompressionAlgorithm::NONE);
        }
        $h = $this->n3->d($this->mx->bi()->ji(), $this->b2->nn());
        $this->n4->iw($h, $bs, $this->iq);
        $this->n3->g($h);
        if (isset($this->ne) && ($h->ar() - $h->ab()) > $this->ne) {
            $this->od(MigratoryDataClient::NOTIFY_MESSAGE_SIZE_LIMIT_EXCEEDED, $bs);
            return;
        }
        $m = $bs->getClosure();
        if (isset($m) && strlen($m) > 0) {
            array_push($this->nf, $m);
        }
        $this->n5->bl($h->aq());
    }
    public function nz()
    {
        foreach ($this->nf as $m) {
            $this->b1->bt(c0::c9 . $m);
            $this->kr->onStatus(MigratoryDataClient::NOTIFY_PUBLISH_FAILED, $m);
        }
        $this->nf = array();
    }
    public function og()
    {
        $h = $this->n3->d($this->mx->bi()->ji(), $this->b2->nn());
        $this->n4->it($h, $this->iq);
        $this->n3->g($h);
        $this->n5->bl($h->aq());
    }
    public function od($oh, $bs)
    {
        if (isset($bs) && strlen($bs->getClosure()) > 0) {
            $this->kr->onStatus($oh, $bs->getClosure());
        }
    }
    public function oi()
    {
        if ($this->n0 != n1::n2) {
            return;
        }
        $this->b1->bg("Call pause");
        $this->n0 = n1::oj;
        $this->ny();
    }
    public function ok()
    {
        if ($this->n0 != n1::oj) {
            return;
        }
        $this->b1->bg("Call resume");
        $this->n0 = n1::n2;
        $this->ol();
        $this->o7();
    }
    public function b5()
    {
        return $this->ay;
    }
    public function om()
    {
        return $this->b1;
    }
    public function bh()
    {
        return $this->mx;
    }
    public function bj()
    {
        return $this->ng;
    }
    public function on($oo)
    {
        $this->ng = $oo;
    }
    public function op()
    {
        return $this->my;
    }
    public function oq()
    {
        return $this->n9;
    }
    public function os()
    {
        $this->n9++;
        return $this->n9;
    }
    public function ot($my)
    {
        $this->my = $my;
    }
    public function ou()
    {
        return $this->n0;
    }
    public function b6()
    {
        return $this->b2;
    }
    public function bd($h)
    {
        if ($this->b2->nk() === MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            $m4 = m0::m1($h);
        } else {
            $m4 = m0::ma($h);
        }
        if (count($m4) > 0) {
            $this->ov($m4);
        } else {
            $this->b1->bt(c0::c2);
            $this->az->no($this->ng, np::ow);
        }
    }
    private function ov($m4)
    {
        foreach ($m4 as $bs) {
            switch ($bs->di()) {
                case ea::ed:
                case ea::ej:
                case ea::c8:
                case ea::ei:
                case ea::es:
                case ea::eb:
                case ea::ec:
                case ea::et:
                    $this->b1->bt(c0::c1 . " " . $bs);
                    $this->ox($bs);
                    break;
                case ea::ee:
                    $this->b1->bt(c0::c2);
                    $this->az->no($this->ng, np::ow);
                    break;
                case ea::eo:
                    break;
                default:
                    $this->b1->bu("No existing opeartion for message: " . $bs);
            }
        }
    }
    private function ox($bs)
    {
        $this->az->no($this->ng, np::ow);
        $dh = $bs->dj();
        switch ($bs->di()) {
            case ea::ed:
                $this->oy($dh);
                break;
            case ea::eb:
                $this->oz($dh);
                break;
            case ea::es:
                $this->p0($dh);
                break;
            case ea::ec:
                $this->p1($dh);
                break;
            case ea::ej:
                $this->p2($dh);
                break;
            case ea::c8:
                $this->p3($dh);
                break;
            case ea::ei:
                $this->p4($dh);
                break;
            case ea::et:
                $this->p5($dh);
                break;    
            default:
                $this->b1->bu("No existing opeartion for message: " . $bs);
        }
    }
    private function oy($dh)
    {
        if (array_key_exists(ev::ew, $dh)) {
            $k = $dh[ev::ew];
            $ko = $this->nh->d1($k);
            if (!isset($ko)) {
                return;
            }
        }
        if (array_key_exists(ev::fq, $dh)) {
            $p6 = $dh[ev::fq];
            $this->p7($p6);
        }
        if (array_key_exists(ev::ex, $dh)) {
            $a0 = $dh[ev::ex];
        }
        $p = false;
        if (array_key_exists(ev::fd, $dh)) {
            $p8 = $dh[ev::fd];
            if ($p8 === 1) {
                $p = true;
            }
        }
        $s = 0;
        if (array_key_exists(ev::fs, $dh)) {
            $s = $dh[ev::fs];
        }
        if ($s == CompressionAlgorithm::ZLIB_BASE64) {
            $a0 = $this->n4->j2($a0);
        } else if ($s >= CompressionAlgorithm::ZLIB_BINARY) {
            $a0 = $this->n4->j5($a0);
        }
        $p9 = MessageType::UPDATE;
        if (array_key_exists(ev::fg, $dh)) {
            $t = $dh[ev::fg];
            switch ($t) {
                case gz::h0:
                    $p9 = MessageType::SNAPSHOT;
                    break;
                case gz::h2:
                    $p9 = MessageType::RECOVERED;
                    break;
                case gz::h3:
                    $p9 = MessageType::HISTORICAL;
                    break;
            }
        }
        $o = QoS::GUARANTEED;
        if (array_key_exists(ev::fe, $dh)) {
            $pa = $dh[ev::fe];
            if ($pa === QoS::STANDARD) {
                $o = QoS::STANDARD;
            }
        }
        $m = "";
        if (array_key_exists(ev::fk, $dh)) {
            $m = $dh[ev::fk];
        }
        $n = "";
        if (array_key_exists(ev::fo, $dh)) {
            $n = $dh[ev::fo];
        }
        if ($this->na == nb::pb && $o == QoS::GUARANTEED) {
            $pc = new k3($k, $a0, $p9, $m, $o, $p, $n, $s);
            if (array_key_exists(ev::ey, $dh)) {
                $q = $dh[ev::ey];
            }
            if (array_key_exists(ev::ez, $dh)) {
                $co = $dh[ev::ez];
            }
            $pc->cy($q);
            $pc->k4($co);
            $pd = x::kn($ko, $q, $co, $this->kr, $this->b1);
            if ($pd == ks::kt) {
                $this->b1->bt(c0::c6 . $pc);
                $this->kr->onMessage($pc);
            } else if ($pd == ks::kv) {
                $this->be($this->ng, x::kb, "seq_higher");
            }
        } else if ($this->na == nb::pe && $o == QoS::GUARANTEED) {
            $pc = new k3($k, $a0, $p9, $m, $o, $p, $n, $s);
            if (array_key_exists(ev::ey, $dh)) {
                $q = $dh[ev::ey];
            }
            if (array_key_exists(ev::ez, $dh)) {
                $co = $dh[ev::ez];
            }
            $pc->cy($q);
            $pc->k4($co);
            $pd = x::kw($ko, $q, $co, $this->kr, $this->b1);
            if ($pd == ks::kt) {
                $this->b1->bt(c0::c6 . $pc);
                $this->kr->onMessage($pc);
            }            
        } else {
            $pc = new k3($k, $a0, $p9, $m, $o, $p, $n, $s);
            $this->b1->bt(c0::c6 . $pc);
            $this->kr->onMessage($pc);
        }
    }
    private function oz($dh)
    {
    }
    private function p5($dh) {
        $d7 = $dh[ev::fa];
        $bg = $dh[ev::f9];
        $this->kr->onStatus($d7, $bg);
    }
    private function p0($dh)
    {
        if (array_key_exists(ev::f1, $dh)) {
            $iq = $dh[ev::f1];
            $this->pf();
            $this->iq = $iq;
            $this->n8 = true;
            $this->n9 = 0;
            if (array_key_exists(ev::fl, $dh)) {
                $pg = $dh[ev::fl];
                if ($pg == 1) {
                    $this->na = nb::pb;
                } else if ($pg == 2) {
                    $this->na = nb::pe;
                }
            }
            if (array_key_exists(ev::fj, $dh)) {
                $ph = $dh[ev::fj];
                $this->az->pi($ph);
                $this->az->no($this->ng, np::ow);
            }
            $this->my = true;
            if (array_key_exists(ev::fq, $dh)) {
                $p6 = $dh[ev::fq];
                $this->p7($p6);
            }
            if (array_key_exists(ev::fr, $dh)) {
                $this->ne = $dh[ev::fr];
                $this->b2->pj($this->ne);
            }
            if (array_key_exists(ev::fp, $dh)) {
                $this->b2->pk($dh[ev::fp]);
            }
            $pl = "";
            if (array_key_exists(ev::fa, $dh)) {
                $pl = $dh[ev::fa];
            }
            $pm = MigratoryDataClient::NOTIFY_CONNECT_OK;
            if (array_key_exists(ev::f5, $dh)) {
                $bv = $dh[ev::f5];
                if ($bv == ha::he) {
                    $pm = MigratoryDataClient::NOTIFY_CONNECT_DENY;
                }
            }
            $this->kr->onStatus($pm, $pl);
            $kl = $this->nh->l6();
            if (count($kl)) {
                $this->o2($kl);
            }
        }
    }
    private function ol()
    {
        $this->n6 = false;
        $this->n7 = 0;
    }
    private function pf()
    {
        $this->b1->bg("Connected to cluster member: " . $this->mx->bi());
        $this->ol();
        $this->b1->bt(c0::c3 . MigratoryDataClient::NOTIFY_SERVER_UP . " " . $this->ng);
        $this->kr->onStatus(MigratoryDataClient::NOTIFY_SERVER_UP, $this->mx->bi()->jk());
    }
    public function pn($po)
    {
        $this->b1->bv("[" . $po . "] [" . $this->mx->bi() . "]");
        $this->b1->bg("Lost connection with the cluster member: " . $this->mx->bi());
        if (!$this->n8) {
            $this->n7++;
            if (!$this->n6) {
                if ($this->n7 >= $this->b2->pp()) {
                    $this->b1->bt(c0::c4 . $po);
                    $this->n6 = true;
                    $this->kr->onStatus(MigratoryDataClient::NOTIFY_SERVER_DOWN, $this->mx->bi()->jk());
                }
            }
        }
    }
    private function p7($p6)
    {
        if (isset($this->nd)) {
            if ($p6 !== $this->nd) {
                $this->nd = $p6;
                // reset epoch and seq
                $this->nh->l8();
            }
        } else {
            $this->nd = $p6;
        }
    }
    private function p1($dh)
    {
    }
    private function p2($dh)
    {
        if (array_key_exists(ev::fa, $dh)
            && array_key_exists(ev::ew, $dh)) {
            $pq = $dh[ev::fa];
            $k = $dh[ev::ew];
            $pr = true;
            $ps = MigratoryDataClient::NOTIFY_SUBSCRIBE_DENY;
            if ($pq == h7::h9) {
                $ps = MigratoryDataClient::NOTIFY_SUBSCRIBE_ALLOW;
                $pr = false;
            } else if ($pq == h7::h8) {
                $ps = MigratoryDataClient::NOTIFY_SUBSCRIBE_DENY;
            }
            if ($pr) {
                $this->nh->l4(array($k));
            }
            $this->b1->bt(c0::ca . $k . " " . $pq . " " . $ps);
            $this->kr->onStatus($ps, $k);
        }
    }
    private function p3($dh)
    {
        if (!isset($dh)) {
            return;
        }
        if (array_key_exists(ev::fk, $dh)
            && array_key_exists(ev::fa, $dh)) {
            $m = $dh[ev::fk];
            $pt = $dh[ev::fa];
            $d7 = MigratoryDataClient::NOTIFY_PUBLISH_FAILED;
            if ($pt == x::k9) {
                $d7 = MigratoryDataClient::NOTIFY_PUBLISH_DENIED;
            } else if ($pt == x::k7) {
                $d7 = MigratoryDataClient::NOTIFY_PUBLISH_OK;
            }
            $this->b1->bt(c0::c8 . $d7 . " " . $m);
            $this->kr->onStatus($d7, $m);
            $i9 = count($this->nf);
            for ($fz = 0; $fz < $i9; $fz++) {
                if ($m === $this->nf[$fz]) {
                    unset($this->nf[$fz]);
                }
            }
            $this->nf = array_values($this->nf);
        }
    }
    private function p4($dh)
    {
        $k = "";
        if (array_key_exists(ev::ew, $dh)) {
            $k = $dh[ev::ew];
        }
        if (array_key_exists(ev::fg, $dh)) {
            $d7 = $dh[ev::fg];
        }
        $this->b1->bt("Recovery status for subject: " . $k . " is " . $d7);
        if (x::kg == $d7) {
            $kl = $this->nh->l6();
            foreach ($kl as $k) {
                $ko = $this->nh->d1($k);
                $pu = $ko->d8();
                if (x::ct === $pu ||
                    x::kd === $pu ||
                    x::kc === $pu) {
                    $ko->d5();
                } else {
                    $ko->d3();
                }
            }
        } else {
            $ko = $this->nh->d1($k);
            if (isset($ko)) {
                $ko->d6($d7);
            }
        }
    }
}
class ks
{
    const kt = 0;
    const ku = 1;
    const kv = 2;
}
class np
{
    const es = 0;
    const ow = 1;
}
class n1
{
    const o8 = 0;
    const oj = 1;
    const n2 = 2;
}
class nb
{
    const nc = 0;
    const pb = 1;
    const pe = 2;
}
class pv
{
    const pw = 30;
    const px = 900;
    const py = 10;
    private $pz = 3;
    private $q0 = MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF;
    private $q1 = 20;
    private $q2 = 360;
    private $q3 = 5;
    private $fp = Version::VERSION;
    private $il;
    private $in;
    private $jd = false;
    private $q4 = 1;
    private $iv = "";
    private $ne = -1;
    private $q5 = 0;
    private $q6 = 1000;
    private $ih = MigratoryDataClient::TRANSPORT_WEBSOCKET;
    private $kl = array();
	private $f = [];
    public function __construct($il, $in)
    {
        $this->il = $il;
        $this->in = $in;
    }
    public function q7($kl, $cn)
    {
        foreach ($kl as $k) {
            $this->kl[$k] = $cn;
        }
    }
    public function l4($kl)
    {
        foreach ($kl as $k) {
            if (array_key_exists($k, $this->kl)) {
                unset($this->kl[$k]);
            }
        }
    }
    public function q8()
    {
        return $this->kl;
    }
    public function nu()
    {
        return $this->fp;
    }
    public function nt()
    {
        return $this->il;
    }
    public function q9($jd)
    {
        $this->jd = $jd;
    }
    public function bb()
    {
        return $this->jd;
    }
    public function qa($iv)
    {
        $this->iv = $iv;
    }
    public function ns()
    {
        return $this->iv;
    }
    public function qb($ih)
    {
        $this->ih = $ih;
    }
    public function nk()
    {
        return $this->ih;
    }
    public function qc($pz)
    {
        $this->pz = $pz;
    }
    public function qd()
    {
        return $this->pz;
    }
    public function qe()
    {
        return $this->q0;
    }
    public function qf($q0)
    {
        $this->q0 = $q0;
    }
    public function qg()
    {
        return $this->q1;
    }
    public function qh($q1)
    {
        $this->q1 = $q1;
    }
    public function qi()
    {
        return $this->q3;
    }
    public function qj($q3)
    {
        $this->q3 = $q3;
    }
    public function pp()
    {
        return $this->q4;
    }
    public function qk($q4)
    {
        $this->q4 = $q4;
    }
    public function ql()
    {
        return $this->q2;
    }
    public function qm($q2)
    {
        $this->q2 = $q2;
    }
    public function nv()
    {
        return $this->in;
    }
    public function b9()
    {
        return $this->q6;
    }
    public function qn($q6)
    {
        $this->q6 = $q6;
    }
    public function qo($qp, $ae)
	{
		$this->f[$qp] = $ae;
	}
    public function nn() {
        return $this->f;
    }
    public function qq()
    {
        return $this->ne;
    }
    public function pj($ne)
    {
        $this->ne = $ne;
    }
    public function of()
    {
        return $this->q5;
    }
    public function pk($q5)
    {
        $this->q5 = $q5;
    }
}
class nj
{
    private $qr = null;
    private $qs = null;
    private $qt = null;
    private $b2;
    private $aw;
    private $qu = pv::pw;
    public function __construct($ni, $aw)
    {
        $this->b2 = $ni;
        $this->aw = $aw;
    }
    public function no($oo, $qv)
    {
        if (isset($this->qr)) {
            $this->aw->b5()->cancelTimer($this->qr);
        }
        $qw = $this->qu;
        if ($qv == np::es) {
            $qx = $this->aw->oq();
            $qw = $this->qy($qx, true);
        }
        if ($qw > 0) {
            $this->qr = $this->aw->b5()->addTimer($qw, function () use ($oo) {
                $ng = $this->aw->bj();
                if (!isset($ng) || $ng !== $oo) {
                    return;
                }
                $this->aw->ot(false);
                $this->aw->ny();
                $this->aw->nz();
                $this->be($ng, x::ka);
            });
        }
    }
    public function be($oo, $po)
    {
        if ($this->aw->ou() != n1::n2) {
            return;
        }
        $ng = $this->aw->bj();
        if (!isset($ng) || $ng !== $oo) {
            return;
        }
        $this->aw->on(null);
        $this->aw->pn($po);
        $qx = $this->aw->os();
        $qw = $this->qy($qx, false);
        $this->qz($qw, $po);
    }
    public function qz($r0, $po)
    {
        if (isset($this->qt)) {
            $this->aw->b5()->cancelTimer($this->qt);
        }
        $this->qt = $this->aw->b5()->addTimer($r0, function () use ($po) {
            $this->aw->o7();
        });
    }
    public function pi($ae)
    {
        $this->qu = $ae * 1.4;
    }
    public function nq()
    {
        if (isset($this->qs)) {
            $this->aw->b5()->cancelTimer($this->qs);
        }
        $this->qs = $this->aw->b5()->addTimer(pv::px, function () {
            $this->aw->og();
            $this->nq();
        });
    }
    public function o9()
    {
        if (isset($this->qr)) {
            $this->aw->b5()->cancelTimer($this->qr);
        }
        if (isset($this->qs)) {
            $this->aw->b5()->cancelTimer($this->qs);
        }
        if (isset($this->qt)) {
            $this->aw->b5()->cancelTimer($this->qt);
        }
    }
    private function qy($qx, $r1)
    {
        $qw = $this->qu;
        if ($qx > 0) {
            if ($qx <= $this->b2->qd()) {
                $qw = ($qx * $this->b2->qi()) - floor((mt_rand() / mt_getrandmax()) * $this->b2->qi());
            } else {
                if ($this->b2->qe() === MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF) {
                    $r2 = $qx - $this->b2->qd();
                    $qw = min(($this->b2->qg() * (2 ** $r2)) - floor((mt_rand() / mt_getrandmax()) * $this->b2->qg() * $r2), $this->b2->ql());
                } else {
                    $qw = $this->b2->r3();
                }
            }
            if ($r1 && $qw < pv::py) {
                $qw = pv::py;
            }
        }
        return $qw;
    }
}
class r4
{
    private $r5 = 3;
    private $fh;
    private $r6 = false;
    private $ni = null;
    private $aw = null;
    private $js = null;
    private $ay = null;
    private $r7 = null;
    private $b1 = null;
    private $n4 = null;
    public function __construct()
    {
        $this->fh = "MigratoryDataClient/v6.0 React-PHP/" . phpversion() . ", version: " . Version::VERSION;
        $this->ni = new pv($this->r5, $this->fh);
        $this->b1 = new bw();
        $this->n4 = new ig();
    }
    private function r8($mi, $r9)
    {
        if (!isset($mi)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: " . $r9 . " - invalid first argument; expected an array of strings");
        }
        foreach ($mi as $mq) {
            if (!is_string($mq)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: " . $r9 . " - invalid first argument; expected an array of strings");
            }
        }
    }
    public function ra($ay)
    {
        if ($this->r6 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setLoop() method");
        }
        $this->ay = $ay;
    }
    public function qa($iv)
    {
        if (trim($iv) === '') {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setEntitlementToken() - invalid argument; expected a non-empty string");
        }
        $this->ni->qa($iv);
        $this->b1->bg("Configuring entitlement token: " . $iv);
        if ($this->r6 === true) {
            $this->aw->ob($iv);
        }
    }
    public function rb($js)
    {
        $this->r8($js, "setServers()");
        if ($this->r6 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setServers() method");
        }
        if (!is_array($js) || count($js) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setServers() - invalid argument; expected a array of strings with size > 0");
        }
        foreach ($js as $addr) {
            if (!isset($addr) || trim($addr) === '') {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setServers() - invalid argument; expected a array of strings with size > 0");
            }
        }
        $this->b1->bg("Setting servers to connect to: " . x::kx($js));
        $this->js = $js;
    }
    public function rc($kr)
    {
        if ($this->r6 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setListener() method");
        }
        $this->r7 = $kr;
    }
    public function rd($bx, $by)
    {
        if ($by < 0 || $by > 4) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setLogListener() - invalid second argument; expected a MigratoryDataLogLevel");
        }
        if ($this->r6 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "Error: setLogListener() - already connected; use this method before connect()");
        }
        $this->b1->bz($bx, $by);
    }
    public function nl()
    {
        if ($this->r6 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "connect() method");
        }
        if (!isset($this->ay)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setLoop().");
        }
        if (!isset($this->r7)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setListener()");
        }
        if (!isset($this->js)) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_SET, "Before connect() you need to use setServers().");
        }
        $this->r6 = true;
        $mx = new jo($this->js, $this->ni->bb());
        $this->aw = new mw($this->ni, $mx, $this->ay, $this->r7, $this->b1);
        $this->aw->nl();
        $kl = $this->ni->q8();
        $re = array_keys($kl);
        foreach ($re as $dn) {
            $this->aw->o0(array($dn), $kl[$dn]);
            $this->b1->bt(c0::ce . $dn);
        }
    }
    public function ny()
    {
        $this->b1->bg("Disconnect from push server and release all resources.");
        if ($this->r6 === true) {
            $this->r6 = false;
            $this->b1->bt(c0::cb);
            $this->aw->oa();
        }
    }
    public function o0($kl, $cn)
    {
        $this->r8($kl, "subscribe()");
        if (!isset($kl) || count($kl) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid first argument; expected a array of strings with size > 0");
        }
        foreach ($kl as $k) {
            if (is_null($k) || strlen($k) == 0 || !x::kj($k)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid argument; expected a valid topic with a non-empty value");
            }    
        }
        if ($cn < 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid second argument; a int with value >= 0");
        }
        $this->b1->bg("Subscribing to: " . x::kx($kl));
        $this->ni->q7($kl, $cn);
        if ($this->r6) {
            $this->b1->bt(c0::ce . x::kx($kl));
            $this->aw->o0($kl, $cn);
        }
    }
    public function o4($kl)
    {
        $this->r8($kl, "subscribe()");
        if (!isset($kl) || count($kl) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: unsubscribe() - invalid argument; expected a array of strings with size > 0");
        }
        foreach ($kl as $k) {
            if (is_null($k) || strlen($k) == 0 || !x::kj($k)) {
                throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: subscribe() - invalid argument; expected a valid topic with a non-empty value");
            }    
        }
        $this->b1->bg("Unsubscribing from: " . x::kx($kl));
        $this->ni->l4($kl);
        if ($this->r6) {
            $this->b1->bt(c0::cf . x::kx($kl));
            $this->aw->o4($kl);
        }
    }
    public function oc($bs)
    {
        if ($this->r6 === false) {
            throw new MigratoryDataException(MigratoryDataException::E_NOT_CONNECTED, "publish() method");
        }
        $k = $bs->getSubject();
        $l = $bs->getContent();
        if (is_null($k) || strlen($k) == 0 || !x::kj($k)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: publish() - invalid argument; expected a valid message with a non-empty topic");
        }
        if (is_null($l) || strlen($l) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: publish() - invalid argument; expected a valid message with a non-empty content");
        }
        $this->b1->bt(c0::cg . $bs);
        $this->aw->oc($bs);
    }
    public function oi()
    {
        if (!$this->r6) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "pause() method");
        }
        $this->b1->bg("Migratorydata client calls pause");
        $this->b1->bt(c0::cc);
        $this->aw->oi();
    }
    public function ok()
    {
        if (!$this->r6) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "resume() method");
        }
        $this->b1->bg("Migratorydata client calls resume");
        $this->b1->bt(c0::cd);
        $this->aw->ok();
    }
    public function q8()
    {
        return array_keys($this->ni->q8());
    }
    public function rf($da)
    {
        if ($da !== MigratoryDataClient::TRANSPORT_HTTP && $da !== MigratoryDataClient::TRANSPORT_WEBSOCKET) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Argument for set_transport must be MigratoryDataClient::TRANSPORT_WEBSOCKET or MigratoryDataClient::TRANSPORT_HTTP");
        }
        if ($this->r6 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setTransport() method");
        }
        $this->ni->qb($da);
        $this->b1->bg("Configuring transport type to: " . $da);
    }
    public function q9($j)
    {
        if ($this->r6 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setEncryption() method");
        }
        $this->ni->q9($j);
        $this->b1->bg("Configuring encryption to: " . x::y($j));
    }
	public function qo($qp, $ae)
	{
		if ($this->r6 === true) {
			throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setHttpHeader() method");
		}
		if (is_null($qp) || strlen($qp) == 0) {
			throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "setHttpHeader() - name is empty");
		}
		if (is_null($ae) || strlen($ae) == 0) {
			throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "setHttpHeader() - value is empty");
		}
		$this->ni->qo($qp, $ae);
        $this->b1->bg("Configuring http header to: " . $qp . ': ' . $ae);
	}
    public function qc($dr)
    {
        if ($this->r6 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setQuickReconnectMaxRetries() method");
        }
        if ($dr < 2) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setQuickReconnectMaxRetries() - invalid argument; expected an integer higher or equal to 2");
        }
        $this->aw->qc($dr);
        $this->b1->bg("Configuring quickreconnect max retries to: " . $dr);
    }
    public function qf($rg)
    {
        if ($this->r6 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectPolicy() method");
        }
        if (!isset($rg) || ($rg !== MigratoryDataClient::CONSTANT_WINDOWS_BACKOFF && $rg !== MigratoryDataClient::TRUNCATED_EXPONENTIAL_BACKOFF)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectPolicy() - invalid argument; expected MigratoryDataClient.CONSTANT_WINDOW_BACKOFF or MigratoryDataClient.TRUNCATED_EXPONENTIAL_BACKOFF");
        }
        $this->ni->qf($rg);
        $this->b1->bg("Configuring reconnect policy to: " . $rg);
    }
    public function qh($rh)
    {
        if ($this->r6 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectTimeInterval() method");
        }
        if ($rh < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectTimeInterval() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->ni->qh($rh);
        $this->b1->bg("Configuring setReconnectTime interval to: " . $rh);
    }
    public function ri($ie)
    {
        if ($this->r6 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "notifyAfterFailedConnectionAttempts() method");
        }
        if ($ie < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: notifyAfterFailedConnectionAttempts() - invalid argument; expected a positive integer");
        }
        $this->ni->qk($ie);
        $this->b1->bg("Configuring the number of failed connection attempts before sending a notification: " . $ie);
    }
    public function qm($rj)
    {
        if ($this->r6 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setReconnectMaxDelay() method");
        }
        if ($rj < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setReconnectMaxDelay() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->ni->qm($rj);
        $this->b1->bg("Configuring setReconnectMax delay to: " . $rj);
    }
    public function qj($rh)
    {
        if ($this->r6 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setQuickReconnectInitialDelay() method");
        }
        if ($rh < 1) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: setQuickReconnectInitialDelay() - invalid argument; expected an integer higher or equal to 1");
        }
        $this->ni->qj($rh);
        $this->b1->bg("Configuring quickReconnectInitial delay to: " . $rh);
    }
    public function rk()
    {
        return $this->r7;
    }
    public function rl($q6)
    {
        if ($this->r6 === true) {
            throw new MigratoryDataException(MigratoryDataException::E_RUNNING, "setConnectionTimeout() method");
        }
        $this->ni->qn($q6);
    }
    public function rm($bs) {
        $k = $bs->getSubject();
        $l = $bs->getContent();
        if (is_null($k) || strlen($k) == 0 || !x::kj($k)) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: publish() - invalid argument; expected a valid message with a non-empty topic");
        }
        if (is_null($l) || strlen($l) == 0) {
            throw new MigratoryDataException(MigratoryDataException::E_ILLEGAL_ARGUMENT, "Error: publish() - invalid argument; expected a valid message with a non-empty content");
        }
        if ($this->ni->qq() == -1) {
            $this->b1->bg("Trying to check message size limit before client connected to push server!");
            return true;
        }
        if ($bs->isCompressed()) {
            if ($bs->getCompressionAlgorithm() == CompressionAlgorithm::ZLIB_BASE64) {
                $l = $this->n4->iy($bs->getContent());
            } else if ($bs->getCompressionAlgorithm() == CompressionAlgorithm::ZLIB_BINARY) {
                $l = $this->n4->iz($bs->getContent());
            }
            if (strlen($l) >= strlen($bs->getContent())) {
                $l = $bs->getContent();
            }
        }
        if (strlen($l) + 512 > $this->ni->qq()) {
            return false;
        }
        return true;
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
    private $rn = null;
    public function __construct()
    {
        $this->rn = new r4();
    }
    public function setLoop(\React\EventLoop\LoopInterface $ay)
    {
        $this->rn->ra($ay);
    }
    public function setListener(MigratoryDataListener $kr)
    {
        $this->rn->rc($kr);
    }
    public function setLogListener(MigratoryDataLogListener $bx, int $by)
    {
        $this->rn->rd($bx, $by);
    }
    public function setEntitlementToken(string $iv)
    {
        $this->rn->qa($iv);
    }
    public function setServers(array $js)
    {
        $this->rn->rb($js);
    }
    public function connect()
    {
        $this->rn->nl();
    }
    public function disconnect()
    {
        $this->rn->ny();
    }
    public function subscribe(array $kl)
    {
        $this->rn->o0($kl, 0);
    }
    public function subscribeWithHistory(array $kl, int $ro)
    {
        $this->rn->o0($kl, $ro);
    }
    public function unsubscribe(array $kl)
    {
        $this->rn->o4($kl);
    }
    public function publish(MigratoryDataMessage $bs)
    {
        $this->rn->oc($bs);
    }
    public function pause()
    {
        $this->rn->oi();
    }
    public function resume()
    {
        $this->rn->ok();
    }
    public function setTransport(string $da)
    {
        $this->rn->rf($da);
    }
    public function setHttpHeader($qp, $ae)
	{
		$this->rn->qo($qp, $ae);
	}
    public function setEncryption(bool $j)
    {
        $this->rn->q9($j);
    }
    public function getSubjects()
    {
        return $this->rn->q8();
    }
    public function getListener()
    {
        return $this->rn->rk();
    }
    public function setQuickReconnectMaxRetries(int $qx)
    {
        $this->rn->qc($qx);
    }
    public function setReconnectPolicy(string $rg)
    {
        $this->rn->qf($rg);
    }
    public function setReconnectTimeInterval(int $rp)
    {
        $this->rn->qh($rp);
    }
    public function notifyAfterFailedConnectionAttempts(int $qx)
    {
        $this->rn->ri($qx);
    }
    public function setReconnectMaxDelay(int $rp)
    {
        $this->rn->qm($rp);
    }
    public function setQuickReconnectInitialDelay(int $rp)
    {
        $this->rn->qj($rp);
    }
    public function setConnectionTimeout(int $q6)
    {
        $this->rn->rl($q6);
    }
    public function isMessageSizeExceeded(MigratoryDataMessage $bs)
    {
        return !$this->rn->rm($bs);
    }
}
