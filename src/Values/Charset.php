<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents character encoding values for the HTML `charset` attribute.
 *
 * @see https://www.iana.org/assignments/character-sets/character-sets.xhtml
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta#charset
 */
enum Charset: string
{
    /**
     * `big5` — Traditional Chinese (Big5).
     */
    case BIG5 = 'big5';

    /**
     * `euc-jp` — Japanese (EUC-JP).
     */
    case EUC_JP = 'euc-jp';

    /**
     * `euc-kr` — Korean (EUC-KR).
     */
    case EUC_KR = 'euc-kr';

    /**
     * `gb2312` — Simplified Chinese (GB2312).
     */
    case GB2312 = 'gb2312';

    /**
     * `gbk` — Simplified Chinese (GBK/GBX).
     */
    case GBK = 'gbk';

    /**
     * `iso-2022-jp` — Japanese (ISO-2022-JP).
     */
    case ISO_2022_JP = 'iso-2022-jp';

    /**
     * `iso-8859-1` — Latin-1 (Western European).
     */
    case ISO_8859_1 = 'iso-8859-1';

    /**
     * `iso-8859-15` — Latin-9 (Western European with Euro sign).
     */
    case ISO_8859_15 = 'iso-8859-15';

    /**
     * `iso-8859-2` — Latin-2 (Central European).
     */
    case ISO_8859_2 = 'iso-8859-2';

    /**
     * `iso-8859-6` — Latin/Arabic.
     */
    case ISO_8859_6 = 'iso-8859-6';

    /**
     * `iso-8859-7` — Greek.
     */
    case ISO_8859_7 = 'iso-8859-7';

    /**
     * `iso-8859-8` — Latin/Hebrew.
     */
    case ISO_8859_8 = 'iso-8859-8';

    /**
     * `iso-8859-9` — Latin-5 (Turkish).
     */
    case ISO_8859_9 = 'iso-8859-9';

    /**
     * `koi8-r` — Russian (KOI8-R).
     */
    case KOI8_R = 'koi8-r';

    /**
     * `koi8-u` — Ukrainian (KOI8-U).
     */
    case KOI8_U = 'koi8-u';

    /**
     * `shift_jis` — Japanese (Shift JIS).
     */
    case SHIFT_JIS = 'shift_jis';

    /**
     * `utf-16` — Unicode UTF-16 encoding.
     */
    case UTF_16 = 'utf-16';

    /**
     * `utf-16be` — Unicode UTF-16 Big Endian.
     */
    case UTF_16BE = 'utf-16be';

    /**
     * `utf-16le` — Unicode UTF-16 Little Endian.
     */
    case UTF_16LE = 'utf-16le';

    /**
     * `utf-32` — Unicode UTF-32 encoding.
     */
    case UTF_32 = 'utf-32';

    /**
     * `utf-32be` — Unicode UTF-32 Big Endian.
     */
    case UTF_32BE = 'utf-32be';

    /**
     * `utf-32le` — Unicode UTF-32 Little Endian.
     */
    case UTF_32LE = 'utf-32le';

    /**
     * `utf-8` — Unicode UTF-8 encoding (the only valid encoding for HTML5 documents).
     */
    case UTF_8 = 'utf-8';

    /**
     * `windows-1251` — Windows Cyrillic.
     */
    case WINDOWS_1251 = 'windows-1251';

    /**
     * `windows-1252` — Windows Latin-1 (Western European).
     */
    case WINDOWS_1252 = 'windows-1252';

    /**
     * `windows-1253` — Windows Greek.
     */
    case WINDOWS_1253 = 'windows-1253';

    /**
     * `windows-1254` — Windows Turkish.
     */
    case WINDOWS_1254 = 'windows-1254';

    /**
     * `windows-1255` — Windows Hebrew.
     */
    case WINDOWS_1255 = 'windows-1255';

    /**
     * `windows-1256` — Windows Arabic.
     */
    case WINDOWS_1256 = 'windows-1256';
}
