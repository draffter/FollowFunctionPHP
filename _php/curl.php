<?php

// Start of curl v.

/**
 * Initialize a cURL session
 * @link http://php.net/manual/en/function.curl-init.php
 * @param url string[optional] <p>
 * If provided, the CURLOPT_URL option will be set
 * to its value. You can manually set this using the 
 * curl_setopt function.
 * </p>
 * @return resource a cURL handle on success, false on errors.
 */
function curl_init ($url = null) {}

/**
 * Copy a cURL handle along with all of its preferences
 * @link http://php.net/manual/en/function.curl-copy-handle.php
 * @param ch resource 
 * @return resource a new cURL handle.
 */
function curl_copy_handle ($ch) {}

/**
 * Gets cURL version information
 * @link http://php.net/manual/en/function.curl-version.php
 * @param age int[optional] <p>
 * </p>
 * @return array an associative array with the following elements: 
 * <tr valign="top">
 * <td>Indice</td>
 * <td>Value description</td>
 * </tr>
 * <tr valign="top">
 * <td>version_number</td>
 * <td>cURL 24 bit version number</td>
 * </tr>
 * <tr valign="top">
 * <td>version</td>
 * <td>cURL version number, as a string</td>
 * </tr>
 * <tr valign="top">
 * <td>ssl_version_number</td>
 * <td>OpenSSL 24 bit version number</td>
 * </tr>
 * <tr valign="top">
 * <td>ssl_version</td>
 * <td>OpenSSL version number, as a string</td>
 * </tr>
 * <tr valign="top">
 * <td>libz_version</td>
 * <td>zlib version number, as a string</td>
 * </tr>
 * <tr valign="top">
 * <td>host</td>
 * <td>Information about the host where cURL was built</td>
 * </tr>
 * <tr valign="top">
 * <td>age</td>
 * <td></td>
 * </tr>
 * <tr valign="top">
 * <td>features</td>
 * <td>A bitmask of the CURL_VERSION_XXX constants</td>
 * </tr>
 * <tr valign="top">
 * <td>protocols</td>
 * <td>An array of protocols names supported by cURL</td>
 * </tr>
 */
function curl_version ($age = null) {}

/**
 * Set an option for a cURL transfer
 * @link http://php.net/manual/en/function.curl-setopt.php
 * @param ch resource 
 * @param option int <p>
 * The CURLOPT_XXX option to set.
 * </p>
 * @param value mixed <p>
 * The value to be set on option.
 * </p>
 * <p>
 * value should be a bool for the
 * following values of the option parameter:
 * <tr valign="top">
 * <td>Option</td>
 * <td>Set value to</td>
 * <td>Notes</td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_AUTOREFERER</td>
 * <td>
 * true to automatically set the Referer: field in
 * requests where it follows a Location: redirect.
 * </td>
 * <td>
 * Available since PHP 5.1.0.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_BINARYTRANSFER</td>
 * <td>
 * true to return the raw output when
 * CURLOPT_RETURNTRANSFER is used.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_COOKIESESSION</td>
 * <td>
 * true to mark this as a new cookie "session". It will force libcurl
 * to ignore all cookies it is about to load that are "session cookies"
 * from the previous session. By default, libcurl always stores and
 * loads all cookies, independent if they are session cookies or not.
 * Session cookies are cookies without expiry date and they are meant
 * to be alive and existing for this "session" only.
 * </td>
 * <td>
 * Available since PHP 5.1.0.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_CRLF</td>
 * <td>
 * true to convert Unix newlines to CRLF newlines
 * on transfers.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_DNS_USE_GLOBAL_CACHE</td>
 * <td>
 * true to use a global DNS cache. This option is
 * not thread-safe and is enabled by default.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_FAILONERROR</td>
 * <td>
 * true to fail silently if the HTTP code returned
 * is greater than or equal to 400. The default behavior is to return
 * the page normally, ignoring the code.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_FILETIME</td>
 * <td>
 * true to attempt to retrieve the modification
 * date of the remote document. This value can be retrieved using
 * the CURLINFO_FILETIME option with
 * curl_getinfo.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_FOLLOWLOCATION</td>
 * <td>
 * true to follow any
 * "Location: " header that the server sends as
 * part of the HTTP header (note this is recursive, PHP will follow as
 * many "Location: " headers that it is sent,
 * unless CURLOPT_MAXREDIRS is set).
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_FORBID_REUSE</td>
 * <td>
 * true to force the connection to explicitly
 * close when it has finished processing, and not be pooled for reuse.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_FRESH_CONNECT</td>
 * <td>
 * true to force the use of a new connection
 * instead of a cached one.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_FTP_USE_EPRT</td>
 * <td>
 * true to use EPRT (and LPRT) when doing active
 * FTP downloads. Use false to disable EPRT and LPRT and use PORT
 * only.
 * </td>
 * <td>
 * Added in PHP 5.0.0.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_FTP_USE_EPSV</td>
 * <td>
 * true to first try an EPSV command for FTP
 * transfers before reverting back to PASV. Set to false
 * to disable EPSV.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_FTPAPPEND</td>
 * <td>
 * true to append to the remote file instead of
 * overwriting it.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_FTPASCII</td>
 * <td>
 * An alias of
 * CURLOPT_TRANSFERTEXT. Use that instead.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_FTPLISTONLY</td>
 * <td>
 * true to only list the names of an FTP
 * directory.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_HEADER</td>
 * <td>
 * true to include the header in the output.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_HTTPGET</td>
 * <td>
 * true to reset the HTTP request method to GET.
 * Since GET is the default, this is only necessary if the request
 * method has been changed.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_HTTPPROXYTUNNEL</td>
 * <td>
 * true to tunnel through a given HTTP proxy.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_MUTE</td>
 * <td>
 * true to be completely silent with regards to
 * the cURL functions.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_NETRC</td>
 * <td>
 * true to scan the ~/.netrc
 * file to find a username and password for the remote site that
 * a connection is being established with.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_NOBODY</td>
 * <td>
 * true to exclude the body from the output.
 * Request method is then set to HEAD. Changing this to false does
 * not change it to GET.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_NOPROGRESS</td>
 * <td><p>
 * true to disable the progress meter for cURL transfers.
 * <p>
 * PHP automatically sets this option to true, this should only be
 * changed for debugging purposes.
 * </p>
 * </p></td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_NOSIGNAL</td>
 * <td>
 * true to ignore any cURL function that causes a
 * signal to be sent to the PHP process. This is turned on by default
 * in multi-threaded SAPIs so timeout options can still be used.
 * </td>
 * <td>
 * Added in cURL 7.10 and PHP 5.0.0.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_POST</td>
 * <td>
 * true to do a regular HTTP POST. This POST is the
 * normal application/x-www-form-urlencoded kind,
 * most commonly used by HTML forms.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_PUT</td>
 * <td>
 * true to HTTP PUT a file. The file to PUT must
 * be set with CURLOPT_INFILE and
 * CURLOPT_INFILESIZE.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_RETURNTRANSFER</td>
 * <td>
 * true to return the transfer as a string of the
 * return value of curl_exec instead of outputting
 * it out directly.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_SSL_VERIFYPEER</td>
 * <td>
 * false to stop cURL from verifying the peer's
 * certificate. Alternate certificates to verify against can be
 * specified with the CURLOPT_CAINFO option
 * or a certificate directory can be specified with the
 * CURLOPT_CAPATH option.
 * CURLOPT_SSL_VERIFYHOST may also need to be
 * true or false if
 * CURLOPT_SSL_VERIFYPEER is disabled (it
 * defaults to 2).
 * </td>
 * <td>
 * true by default as of cURL 7.10. Default bundle installed as of
 * cURL 7.10.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_TRANSFERTEXT</td>
 * <td>
 * true to use ASCII mode for FTP transfers.
 * For LDAP, it retrieves data in plain text instead of HTML. On
 * Windows systems, it will not set STDOUT to binary
 * mode.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_UNRESTRICTED_AUTH</td>
 * <td>
 * true to keep sending the username and password
 * when following locations (using
 * CURLOPT_FOLLOWLOCATION), even when the
 * hostname has changed.
 * </td>
 * <td>
 * Added in PHP 5.0.0.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_UPLOAD</td>
 * <td>
 * true to prepare for an upload.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_VERBOSE</td>
 * <td>
 * true to output verbose information. Writes
 * output to STDERR, or the file specified using
 * CURLOPT_STDERR.
 * </td>
 * <td>
 * </td>
 * </tr>
 * </p>
 * <p>
 * value should be an integer for the
 * following values of the option parameter:
 * <tr valign="top">
 * <td>Option</td>
 * <td>Set value to</td>
 * <td>Notes</td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_BUFFERSIZE</td>
 * <td>
 * The size of the buffer to use for each read. There is no guarantee
 * this request will be fulfilled, however.
 * </td>
 * <td>
 * Added in cURL 7.10 and PHP 5.0.0.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_CLOSEPOLICY</td>
 * <td>
 * Either
 * CURLCLOSEPOLICY_LEAST_RECENTLY_USED or
 * CURLCLOSEPOLICY_OLDEST.
 * There are three other CURLCLOSEPOLICY_
 * constants, but cURL does not support them yet.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_CONNECTTIMEOUT</td>
 * <td>
 * The number of seconds to wait whilst trying to connect. Use 0 to
 * wait indefinitely.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_DNS_CACHE_TIMEOUT</td>
 * <td>
 * The number of seconds to keep DNS entries in memory. This
 * option is set to 120 (2 minutes) by default.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_FTPSSLAUTH</td>
 * <td>
 * The FTP authentication method (when is activated):
 * CURLFTPAUTH_SSL (try SSL first),
 * CURLFTPAUTH_TLS (try TLS first), or
 * CURLFTPAUTH_DEFAULT (let cURL decide).
 * </td>
 * <td>
 * Added in cURL 7.12.2 and PHP 5.1.0.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_HTTP_VERSION</td>
 * <td>
 * CURL_HTTP_VERSION_NONE (default, lets CURL
 * decide which version to use),
 * CURL_HTTP_VERSION_1_0 (forces HTTP/1.0),
 * or CURL_HTTP_VERSION_1_1 (forces HTTP/1.1).
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_HTTPAUTH</td>
 * <td>
 * <p>
 * The HTTP authentication method(s) to use. The options are:
 * CURLAUTH_BASIC,
 * CURLAUTH_DIGEST,
 * CURLAUTH_GSSNEGOTIATE,
 * CURLAUTH_NTLM,
 * CURLAUTH_ANY, and
 * CURLAUTH_ANYSAFE.
 * </p>
 * <p>
 * The bitwise | (or) operator can be used to combine
 * more than one method. If this is done, cURL will poll the server to see
 * what methods it supports and pick the best one.
 * </p>
 * <p>
 * CURLAUTH_ANY is an alias for
 * CURLAUTH_BASIC | CURLAUTH_DIGEST | CURLAUTH_GSSNEGOTIATE | CURLAUTH_NTLM.
 * </p>
 * <p>
 * CURLAUTH_ANYSAFE is an alias for
 * CURLAUTH_DIGEST | CURLAUTH_GSSNEGOTIATE | CURLAUTH_NTLM.
 * </p>
 * </td>
 * <td>
 * Added in PHP 5.0.0.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_INFILESIZE</td>
 * <td>
 * The expected size, in bytes, of the file when uploading a file to a
 * remote site.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_LOW_SPEED_LIMIT</td>
 * <td>
 * The transfer speed, in bytes per second, that the transfer should be
 * below during CURLOPT_LOW_SPEED_TIME seconds
 * for PHP to consider the transfer too slow and abort.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_LOW_SPEED_TIME</td>
 * <td>
 * The number of seconds the transfer should be below
 * CURLOPT_LOW_SPEED_LIMIT for PHP to consider
 * the transfer too slow and abort.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_MAXCONNECTS</td>
 * <td>
 * The maximum amount of persistent connections that are allowed.
 * When the limit is reached,
 * CURLOPT_CLOSEPOLICY is used to determine
 * which connection to close.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_MAXREDIRS</td>
 * <td>
 * The maximum amount of HTTP redirections to follow. Use this option
 * alongside CURLOPT_FOLLOWLOCATION.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_PORT</td>
 * <td>
 * An alternative port number to connect to.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_PROXYAUTH</td>
 * <td>
 * The HTTP authentication method(s) to use for the proxy connection.
 * Use the same bitmasks as described in
 * CURLOPT_HTTPAUTH. For proxy authentication,
 * only CURLAUTH_BASIC and
 * CURLAUTH_NTLM are currently supported.
 * </td>
 * <td>
 * Added in cURL 7.10.7 and PHP 5.1.0.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_PROXYPORT</td>
 * <td>
 * The port number of the proxy to connect to. This port number can
 * also be set in CURLOPT_PROXY.
 * </td>
 * <td>
 * Added in PHP 5.0.0.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_PROXYTYPE</td>
 * <td>
 * Either CURLPROXY_HTTP (default) or
 * CURLPROXY_SOCKS5.
 * </td>
 * <td>
 * Added in cURL 7.10 and PHP 5.0.0.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_RESUME_FROM</td>
 * <td>
 * The offset, in bytes, to resume a transfer from.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_SSL_VERIFYHOST</td>
 * <td>
 * 1 to check the existence of a common name in the
 * SSL peer certificate. 2 to check the existence of
 * a common name and also verify that it matches the hostname
 * provided.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_SSLVERSION</td>
 * <td>
 * The SSL version (2 or 3) to use. By default PHP will try to determine
 * this itself, although in some cases this must be set manually.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_TIMECONDITION</td>
 * <td>
 * How CURLOPT_TIMEVALUE is treated.
 * Use CURL_TIMECOND_IFMODSINCE to return the
 * page only if it has been modified since the time specified in
 * CURLOPT_TIMEVALUE. If it hasn't been modified,
 * a "304 Not Modified" header will be returned
 * assuming CURLOPT_HEADER is true.
 * Use CURL_TIMECOND_IFUNMODSINCE for the reverse
 * effect. CURL_TIMECOND_IFMODSINCE is the
 * default.
 * </td>
 * <td>
 * Added in PHP 5.1.0.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_TIMEOUT</td>
 * <td>
 * The maximum number of seconds to allow cURL functions to execute.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_TIMEVALUE</td>
 * <td>
 * The time in seconds since January 1st, 1970. The time will be used
 * by CURLOPT_TIMECONDITION. By default,
 * CURL_TIMECOND_IFMODSINCE is used.
 * </td>
 * <td>
 * </td>
 * </tr>
 * </p>
 * <p>
 * value should be a string for the
 * following values of the option parameter:
 * <tr valign="top">
 * <td>Option</td>
 * <td>Set value to</td>
 * <td>Notes</td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_CAINFO</td>
 * <td>
 * The name of a file holding one or more certificates to verify the
 * peer with. This only makes sense when used in combination with
 * CURLOPT_SSL_VERIFYPEER.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_CAPATH</td>
 * <td>
 * A directory that holds multiple CA certificates. Use this option
 * alongside CURLOPT_SSL_VERIFYPEER.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_COOKIE</td>
 * <td>
 * The contents of the "Set-Cookie: " header to be
 * used in the HTTP request.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_COOKIEFILE</td>
 * <td>
 * The name of the file containing the cookie data. The cookie file can
 * be in Netscape format, or just plain HTTP-style headers dumped into
 * a file.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_COOKIEJAR</td>
 * <td>
 * The name of a file to save all internal cookies to when the
 * connection closes.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_CUSTOMREQUEST</td>
 * <td><p>
 * A custom request method to use instead of
 * "GET" or "HEAD" when doing
 * a HTTP request. This is useful for doing
 * "DELETE" or other, more obscure HTTP requests.
 * Valid values are things like "GET",
 * "POST", "CONNECT" and so on;
 * i.e. Do not enter a whole HTTP request line here. For instance,
 * entering "GET /index.html HTTP/1.0\r\n\r\n"
 * would be incorrect.
 * <p>
 * Don't do this without making sure the server supports the custom
 * request method first.
 * </p>
 * </p></td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_EGDSOCKET</td>
 * <td>
 * Like CURLOPT_RANDOM_FILE, except a filename
 * to an Entropy Gathering Daemon socket.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_ENCODING</td>
 * <td>
 * The contents of the "Accept-Encoding: " header.
 * This enables decoding of the response. Supported encodings are
 * "identity", "deflate", and
 * "gzip". If an empty string, "",
 * is set, a header containing all supported encoding types is sent.
 * </td>
 * <td>
 * Added in cURL 7.10.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_FTPPORT</td>
 * <td>
 * The value which will be used to get the IP address to use
 * for the FTP "POST" instruction. The "POST" instruction tells
 * the remote server to connect to our specified IP address. The
 * string may be a plain IP address, a hostname, a network
 * interface name (under Unix), or just a plain '-' to use the
 * systems default IP address.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_INTERFACE</td>
 * <td>
 * The name of the outgoing network interface to use. This can be an
 * interface name, an IP address or a host name.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_KRB4LEVEL</td>
 * <td>
 * The KRB4 (Kerberos 4) security level. Any of the following values
 * (in order from least to most powerful) are valid:
 * "clear",
 * "safe",
 * "confidential",
 * "private"..
 * If the string does not match one of these,
 * "private" is used. Setting this option to &null;
 * will disable KRB4 security. Currently KRB4 security only works
 * with FTP transactions.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_POSTFIELDS</td>
 * <td>
 * The full data to post in a HTTP "POST" operation.
 * To post a file, prepend a filename with @ and
 * use the full path. This can either be passed as a urlencoded 
 * string like 'para1=val1&amp;para2=val2&amp;...' 
 * or as an array with the field name as key and field data as value.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_PROXY</td>
 * <td>
 * The HTTP proxy to tunnel requests through.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_PROXYUSERPWD</td>
 * <td>
 * A username and password formatted as
 * "[username]:[password]" to use for the
 * connection to the proxy.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_RANDOM_FILE</td>
 * <td>
 * A filename to be used to seed the random number generator for SSL.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_RANGE</td>
 * <td>
 * Range(s) of data to retrieve in the format
 * "X-Y" where X or Y are optional. HTTP transfers
 * also support several intervals, separated with commas in the format
 * "X-Y,N-M".
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_REFERER</td>
 * <td>
 * The contents of the "Referer: " header to be used
 * in a HTTP request.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_SSL_CIPHER_LIST</td>
 * <td>
 * A list of ciphers to use for SSL. For example,
 * RC4-SHA and TLSv1 are valid
 * cipher lists.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_SSLCERT</td>
 * <td>
 * The name of a file containing a PEM formatted certificate.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_SSLCERTPASSWD</td>
 * <td>
 * The password required to use the
 * CURLOPT_SSLCERT certificate.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_SSLCERTTYPE</td>
 * <td>
 * The format of the certificate. Supported formats are
 * "PEM" (default), "DER",
 * and "ENG".
 * </td>
 * <td>
 * Added in cURL 7.9.3 and PHP 5.0.0.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_SSLENGINE</td>
 * <td>
 * The identifier for the crypto engine of the private SSL key
 * specified in CURLOPT_SSLKEY.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_SSLENGINE_DEFAULT</td>
 * <td>
 * The identifier for the crypto engine used for asymmetric crypto
 * operations.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_SSLKEY</td>
 * <td>
 * The name of a file containing a private SSL key.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_SSLKEYPASSWD</td>
 * <td><p>
 * The secret password needed to use the private SSL key specified in
 * CURLOPT_SSLKEY.
 * <p>
 * Since this option contains a sensitive password, remember to keep
 * the PHP script it is contained within safe.
 * </p>
 * </p></td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_SSLKEYTYPE</td>
 * <td>
 * The key type of the private SSL key specified in
 * CURLOPT_SSLKEY. Supported key types are
 * "PEM" (default), "DER",
 * and "ENG".
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_URL</td>
 * <td>
 * The URL to fetch. This can also be set when initializing a
 * session with curl_init.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_USERAGENT</td>
 * <td>
 * The contents of the "User-Agent: " header to be
 * used in a HTTP request.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_USERPWD</td>
 * <td>
 * A username and password formatted as
 * "[username]:[password]" to use for the
 * connection.
 * </td>
 * <td>
 * </td>
 * </tr>
 * </p>
 * <p>
 * value should be an array for the
 * following values of the option parameter:
 * <tr valign="top">
 * <td>Option</td>
 * <td>Set value to</td>
 * <td>Notes</td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_HTTP200ALIASES</td>
 * <td>
 * An array of HTTP 200 responses that will be treated as valid
 * responses and not as errors.
 * </td>
 * <td>
 * Added in cURL 7.10.3 and PHP 5.0.0.
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_HTTPHEADER</td>
 * <td>
 * An array of HTTP header fields to set.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_POSTQUOTE</td>
 * <td>
 * An array of FTP commands to execute on the server after the FTP
 * request has been performed.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_QUOTE</td>
 * <td>
 * An array of FTP commands to execute on the server prior to the FTP
 * request.
 * </td>
 * <td>
 * </td>
 * </tr>
 * </p>
 * <p>
 * value should be a stream resource (using
 * fopen, for example) for the following values of the
 * option parameter:
 * <tr valign="top">
 * <td>Option</td>
 * <td>Set value to</td>
 * <td>Notes</td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_FILE</td>
 * <td>
 * The file that the transfer should be written to. The default
 * is STDOUT (the browser window).
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_INFILE</td>
 * <td>
 * The file that the transfer should be read from when uploading.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_STDERR</td>
 * <td>
 * An alternative location to output errors to instead of
 * STDERR.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_WRITEHEADER</td>
 * <td>
 * The file that the header part of the transfer is written to.
 * </td>
 * <td>
 * </td>
 * </tr>
 * </p>
 * <p>
 * value should be a string that is the name of a valid
 * callback function for the following values of the
 * option parameter:
 * <tr valign="top">
 * <td>Option</td>
 * <td>Set value to</td>
 * <td>Notes</td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_HEADERFUNCTION</td>
 * <td>
 * The name of a callback function where the callback function takes
 * two parameters. The first is the cURL resource, the second is a
 * string with the header data to be written. The header data must
 * be written when using this callback function. Return the number of 
 * bytes written.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_PASSWDFUNCTION</td>
 * <td>
 * The name of a callback function where the callback function takes
 * three parameters. The first is the cURL resource, the second is a
 * string containing a password prompt, and the third is the maximum
 * password length. Return the string containing the password.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_READFUNCTION</td>
 * <td>
 * The name of a callback function where the callback function takes
 * two parameters. The first is the cURL resource, and the second is a
 * string with the data to be read. The data must be read by using this
 * callback function. Return the number of bytes read. Return 0 to signal
 * EOF.
 * </td>
 * <td>
 * </td>
 * </tr>
 * <tr valign="top">
 * <td>CURLOPT_WRITEFUNCTION</td>
 * <td>
 * The name of a callback function where the callback function takes
 * two parameters. The first is the cURL resource, and the second is a
 * string with the data to be written. The data must be written by using
 * this callback function. Must return the exact number of bytes written 
 * or this will fail.
 * </td>
 * <td>
 * </td>
 * </tr>
 * </p>
 * @return bool Returns true on success or false on failure.
 */
function curl_setopt ($ch, $option, $value) {}

/**
 * Set multiple options for a cURL transfer
 * @link http://php.net/manual/en/function.curl-setopt-array.php
 * @param ch resource 
 * @param options array <p>
 * An array specifying which options to set and their values.
 * The keys should be valid curl_setopt constants or
 * their integer equivalents.
 * </p>
 * @return bool true if all options were successfully set. If an option could
 * not be successfully set, false is immediately returned, ignoring any
 * future options in the options array.
 */
function curl_setopt_array ($ch, array $options) {}

/**
 * Perform a cURL session
 * @link http://php.net/manual/en/function.curl-exec.php
 * @param ch resource 
 * @return mixed Returns true on success or false on failure. However, if the CURLOPT_RETURNTRANSFER
 * option is set, it will return the result on success, false on failure.
 */
function curl_exec ($ch) {}

/**
 * Get information regarding a specific transfer
 * @link http://php.net/manual/en/function.curl-getinfo.php
 * @param ch resource 
 * @param opt int[optional] <p>
 * This may be one of the following constants:
 * CURLINFO_EFFECTIVE_URL - Last effective URL
 * @return mixed If opt is given, returns its value as a string.
 * Otherwise, returns an associative array with the following elements 
 * (which correspond to opt):
 * "url"
 * "content_type"
 * "http_code"
 * "header_size"
 * "request_size"
 * "filetime"
 * "ssl_verify_result"
 * "redirect_count"
 * "total_time"
 * "namelookup_time"
 * "connect_time"
 * "pretransfer_time"
 * "size_upload"
 * "size_download"
 * "speed_download"
 * "speed_upload"
 * "download_content_length"
 * "upload_content_length"
 * "starttransfer_time"
 * "redirect_time"
 */
function curl_getinfo ($ch, $opt = null) {}

/**
 * Return a string containing the last error for the current session
 * @link http://php.net/manual/en/function.curl-error.php
 * @param ch resource 
 * @return string the error message or '' (the empty string) if no
 * error occurred.
 */
function curl_error ($ch) {}

/**
 * Return the last error number
 * @link http://php.net/manual/en/function.curl-errno.php
 * @param ch resource 
 * @return int the error number or 0 (zero) if no error
 * occurred.
 */
function curl_errno ($ch) {}

/**
 * Close a cURL session
 * @link http://php.net/manual/en/function.curl-close.php
 * @param ch resource 
 * @return void 
 */
function curl_close ($ch) {}

/**
 * Returns a new cURL multi handle
 * @link http://php.net/manual/en/function.curl-multi-init.php
 * @return resource a cURL on handle on success, false on failure.
 */
function curl_multi_init () {}

/**
 * Add a normal cURL handle to a cURL multi handle
 * @link http://php.net/manual/en/function.curl-multi-add-handle.php
 * @param mh resource 
 * @param ch resource 
 * @return int 0 on success, or one of the CURLM_XXX errors
 * code.
 */
function curl_multi_add_handle ($mh, $ch) {}

/**
 * Remove a multi handle from a set of cURL handles
 * @link http://php.net/manual/en/function.curl-multi-remove-handle.php
 * @param mh resource 
 * @param ch resource 
 * @return int On success, returns a cURL handle, false on failure.
 */
function curl_multi_remove_handle ($mh, $ch) {}

/**
 * Get all the sockets associated with the cURL extension, which can then be "selected"
 * @link http://php.net/manual/en/function.curl-multi-select.php
 * @param mh resource 
 * @param timeout float[optional] <p>
 * Time, in seconds, to wait for a response.
 * </p>
 * @return int On success, returns the number of descriptors contained in, 
 * the descriptor sets. On failure, this function will return false.
 */
function curl_multi_select ($mh, $timeout = null) {}

/**
 * Run the sub-connections of the current cURL handle
 * @link http://php.net/manual/en/function.curl-multi-exec.php
 * @param mh resource 
 * @param still_running int <p>
 * A reference to a flag to tell whether the operations are still running.
 * </p>
 * @return int A cURL code defined in the cURL Predefined Constants.
 * </p>
 * <p>
 * This only returns errors regarding the whole multi stack. There might still have 
 * occurred problems on individual transfers even when this function returns 
 * CURLM_OK.
 */
function curl_multi_exec ($mh, &$still_running) {}

/**
 * Return the content of a cURL handle if <constant>CURLOPT_RETURNTRANSFER</constant> is set
 * @link http://php.net/manual/en/function.curl-multi-getcontent.php
 * @param ch resource 
 * @return string Return the content of a cURL handle if CURLOPT_RETURNTRANSFER is set.
 */
function curl_multi_getcontent ($ch) {}

/**
 * Get information about the current transfers
 * @link http://php.net/manual/en/function.curl-multi-info-read.php
 * @param mh resource 
 * @param msgs_in_queue int[optional] <p>
 * Number of messages that are still in the queue
 * </p>
 * @return array On success, returns an associative array for the message, false on failure.
 */
function curl_multi_info_read ($mh, &$msgs_in_queue = null) {}

/**
 * Close a set of cURL handles
 * @link http://php.net/manual/en/function.curl-multi-close.php
 * @param mh resource 
 * @return void 
 */
function curl_multi_close ($mh) {}

define ('CURLOPT_DNS_USE_GLOBAL_CACHE', 91);
define ('CURLOPT_DNS_CACHE_TIMEOUT', 92);
define ('CURLOPT_PORT', 3);
define ('CURLOPT_FILE', 10001);
define ('CURLOPT_READDATA', 10009);
define ('CURLOPT_INFILE', 10009);
define ('CURLOPT_INFILESIZE', 14);
define ('CURLOPT_URL', 10002);
define ('CURLOPT_PROXY', 10004);
define ('CURLOPT_VERBOSE', 41);
define ('CURLOPT_HEADER', 42);
define ('CURLOPT_HTTPHEADER', 10023);
define ('CURLOPT_NOPROGRESS', 43);
define ('CURLOPT_NOBODY', 44);
define ('CURLOPT_FAILONERROR', 45);
define ('CURLOPT_UPLOAD', 46);
define ('CURLOPT_POST', 47);
define ('CURLOPT_FTPLISTONLY', 48);
define ('CURLOPT_FTPAPPEND', 50);
define ('CURLOPT_NETRC', 51);

/**
 * This constant is not available when open_basedir 
 * or safe_mode are enabled.
 * @link http://php.net/manual/en/curl.constants.php
 */
define ('CURLOPT_FOLLOWLOCATION', 52);
define ('CURLOPT_PUT', 54);
define ('CURLOPT_USERPWD', 10005);
define ('CURLOPT_PROXYUSERPWD', 10006);
define ('CURLOPT_RANGE', 10007);
define ('CURLOPT_TIMEOUT', 13);
define ('CURLOPT_POSTFIELDS', 10015);
define ('CURLOPT_REFERER', 10016);
define ('CURLOPT_USERAGENT', 10018);
define ('CURLOPT_FTPPORT', 10017);
define ('CURLOPT_FTP_USE_EPSV', 85);
define ('CURLOPT_LOW_SPEED_LIMIT', 19);
define ('CURLOPT_LOW_SPEED_TIME', 20);
define ('CURLOPT_RESUME_FROM', 21);
define ('CURLOPT_COOKIE', 10022);

/**
 * Available since PHP 5.1.0
 * @link http://php.net/manual/en/curl.constants.php
 */
define ('CURLOPT_COOKIESESSION', 96);

/**
 * Available since PHP 5.1.0
 * @link http://php.net/manual/en/curl.constants.php
 */
define ('CURLOPT_AUTOREFERER', 58);
define ('CURLOPT_SSLCERT', 10025);
define ('CURLOPT_SSLCERTPASSWD', 10026);
define ('CURLOPT_WRITEHEADER', 10029);
define ('CURLOPT_SSL_VERIFYHOST', 81);
define ('CURLOPT_COOKIEFILE', 10031);
define ('CURLOPT_SSLVERSION', 32);
define ('CURLOPT_TIMECONDITION', 33);
define ('CURLOPT_TIMEVALUE', 34);
define ('CURLOPT_CUSTOMREQUEST', 10036);
define ('CURLOPT_STDERR', 10037);
define ('CURLOPT_TRANSFERTEXT', 53);
define ('CURLOPT_RETURNTRANSFER', 19913);
define ('CURLOPT_QUOTE', 10028);
define ('CURLOPT_POSTQUOTE', 10039);
define ('CURLOPT_INTERFACE', 10062);
define ('CURLOPT_KRB4LEVEL', 10063);
define ('CURLOPT_HTTPPROXYTUNNEL', 61);
define ('CURLOPT_FILETIME', 69);
define ('CURLOPT_WRITEFUNCTION', 20011);
define ('CURLOPT_READFUNCTION', 20012);
define ('CURLOPT_HEADERFUNCTION', 20079);
define ('CURLOPT_MAXREDIRS', 68);
define ('CURLOPT_MAXCONNECTS', 71);
define ('CURLOPT_CLOSEPOLICY', 72);
define ('CURLOPT_FRESH_CONNECT', 74);
define ('CURLOPT_FORBID_REUSE', 75);
define ('CURLOPT_RANDOM_FILE', 10076);
define ('CURLOPT_EGDSOCKET', 10077);
define ('CURLOPT_CONNECTTIMEOUT', 78);
define ('CURLOPT_SSL_VERIFYPEER', 64);
define ('CURLOPT_CAINFO', 10065);
define ('CURLOPT_CAPATH', 10097);
define ('CURLOPT_COOKIEJAR', 10082);
define ('CURLOPT_SSL_CIPHER_LIST', 10083);
define ('CURLOPT_BINARYTRANSFER', 19914);
define ('CURLOPT_NOSIGNAL', 99);
define ('CURLOPT_PROXYTYPE', 101);
define ('CURLOPT_BUFFERSIZE', 98);
define ('CURLOPT_HTTPGET', 80);
define ('CURLOPT_HTTP_VERSION', 84);
define ('CURLOPT_SSLKEY', 10087);
define ('CURLOPT_SSLKEYTYPE', 10088);
define ('CURLOPT_SSLKEYPASSWD', 10026);
define ('CURLOPT_SSLENGINE', 10089);
define ('CURLOPT_SSLENGINE_DEFAULT', 90);
define ('CURLOPT_SSLCERTTYPE', 10086);
define ('CURLOPT_CRLF', 27);
define ('CURLOPT_ENCODING', 10102);
define ('CURLOPT_PROXYPORT', 59);
define ('CURLOPT_UNRESTRICTED_AUTH', 105);
define ('CURLOPT_FTP_USE_EPRT', 106);

/**
 * Available since PHP 5.2.1
 * @link http://php.net/manual/en/curl.constants.php
 */
define ('CURLOPT_TCP_NODELAY', 121);
define ('CURLOPT_HTTP200ALIASES', 10104);
define ('CURL_TIMECOND_IFMODSINCE', 1);
define ('CURL_TIMECOND_IFUNMODSINCE', 2);
define ('CURL_TIMECOND_LASTMOD', 3);
define ('CURLOPT_HTTPAUTH', 107);
define ('CURLAUTH_BASIC', 1);
define ('CURLAUTH_DIGEST', 2);
define ('CURLAUTH_GSSNEGOTIATE', 4);
define ('CURLAUTH_NTLM', 8);
define ('CURLAUTH_ANY', -1);
define ('CURLAUTH_ANYSAFE', -2);
define ('CURLOPT_PROXYAUTH', 111);
define ('CURLOPT_FTP_CREATE_MISSING_DIRS', 110);

/**
 * Available since PHP 5.2.4
 * @link http://php.net/manual/en/curl.constants.php
 */
define ('CURLOPT_PRIVATE', 10103);
define ('CURLCLOSEPOLICY_LEAST_RECENTLY_USED', 2);
define ('CURLCLOSEPOLICY_LEAST_TRAFFIC', 3);
define ('CURLCLOSEPOLICY_SLOWEST', 4);
define ('CURLCLOSEPOLICY_CALLBACK', 5);
define ('CURLCLOSEPOLICY_OLDEST', 1);
define ('CURLINFO_EFFECTIVE_URL', 1048577);
define ('CURLINFO_HTTP_CODE', 2097154);
define ('CURLINFO_HEADER_SIZE', 2097163);
define ('CURLINFO_REQUEST_SIZE', 2097164);
define ('CURLINFO_TOTAL_TIME', 3145731);
define ('CURLINFO_NAMELOOKUP_TIME', 3145732);
define ('CURLINFO_CONNECT_TIME', 3145733);
define ('CURLINFO_PRETRANSFER_TIME', 3145734);
define ('CURLINFO_SIZE_UPLOAD', 3145735);
define ('CURLINFO_SIZE_DOWNLOAD', 3145736);
define ('CURLINFO_SPEED_DOWNLOAD', 3145737);
define ('CURLINFO_SPEED_UPLOAD', 3145738);
define ('CURLINFO_FILETIME', 2097166);
define ('CURLINFO_SSL_VERIFYRESULT', 2097165);
define ('CURLINFO_CONTENT_LENGTH_DOWNLOAD', 3145743);
define ('CURLINFO_CONTENT_LENGTH_UPLOAD', 3145744);
define ('CURLINFO_STARTTRANSFER_TIME', 3145745);
define ('CURLINFO_CONTENT_TYPE', 1048594);
define ('CURLINFO_REDIRECT_TIME', 3145747);
define ('CURLINFO_REDIRECT_COUNT', 2097172);

/**
 * Available since PHP 5.1.3
 * @link http://php.net/manual/en/curl.constants.php
 */
define ('CURLINFO_HEADER_OUT', 2);

/**
 * Available since PHP 5.2.4
 * @link http://php.net/manual/en/curl.constants.php
 */
define ('CURLINFO_PRIVATE', 1048597);
define ('CURL_VERSION_IPV6', 1);
define ('CURL_VERSION_KERBEROS4', 2);
define ('CURL_VERSION_SSL', 4);
define ('CURL_VERSION_LIBZ', 8);
define ('CURLVERSION_NOW', 2);
define ('CURLE_OK', 0);
define ('CURLE_UNSUPPORTED_PROTOCOL', 1);
define ('CURLE_FAILED_INIT', 2);
define ('CURLE_URL_MALFORMAT', 3);
define ('CURLE_URL_MALFORMAT_USER', 4);
define ('CURLE_COULDNT_RESOLVE_PROXY', 5);
define ('CURLE_COULDNT_RESOLVE_HOST', 6);
define ('CURLE_COULDNT_CONNECT', 7);
define ('CURLE_FTP_WEIRD_SERVER_REPLY', 8);
define ('CURLE_FTP_ACCESS_DENIED', 9);
define ('CURLE_FTP_USER_PASSWORD_INCORRECT', 10);
define ('CURLE_FTP_WEIRD_PASS_REPLY', 11);
define ('CURLE_FTP_WEIRD_USER_REPLY', 12);
define ('CURLE_FTP_WEIRD_PASV_REPLY', 13);
define ('CURLE_FTP_WEIRD_227_FORMAT', 14);
define ('CURLE_FTP_CANT_GET_HOST', 15);
define ('CURLE_FTP_CANT_RECONNECT', 16);
define ('CURLE_FTP_COULDNT_SET_BINARY', 17);
define ('CURLE_PARTIAL_FILE', 18);
define ('CURLE_FTP_COULDNT_RETR_FILE', 19);
define ('CURLE_FTP_WRITE_ERROR', 20);
define ('CURLE_FTP_QUOTE_ERROR', 21);
define ('CURLE_HTTP_NOT_FOUND', 22);
define ('CURLE_WRITE_ERROR', 23);
define ('CURLE_MALFORMAT_USER', 24);
define ('CURLE_FTP_COULDNT_STOR_FILE', 25);
define ('CURLE_READ_ERROR', 26);
define ('CURLE_OUT_OF_MEMORY', 27);
define ('CURLE_OPERATION_TIMEOUTED', 28);
define ('CURLE_FTP_COULDNT_SET_ASCII', 29);
define ('CURLE_FTP_PORT_FAILED', 30);
define ('CURLE_FTP_COULDNT_USE_REST', 31);
define ('CURLE_FTP_COULDNT_GET_SIZE', 32);
define ('CURLE_HTTP_RANGE_ERROR', 33);
define ('CURLE_HTTP_POST_ERROR', 34);
define ('CURLE_SSL_CONNECT_ERROR', 35);
define ('CURLE_FTP_BAD_DOWNLOAD_RESUME', 36);
define ('CURLE_FILE_COULDNT_READ_FILE', 37);
define ('CURLE_LDAP_CANNOT_BIND', 38);
define ('CURLE_LDAP_SEARCH_FAILED', 39);
define ('CURLE_LIBRARY_NOT_FOUND', 40);
define ('CURLE_FUNCTION_NOT_FOUND', 41);
define ('CURLE_ABORTED_BY_CALLBACK', 42);
define ('CURLE_BAD_FUNCTION_ARGUMENT', 43);
define ('CURLE_BAD_CALLING_ORDER', 44);
define ('CURLE_HTTP_PORT_FAILED', 45);
define ('CURLE_BAD_PASSWORD_ENTERED', 46);
define ('CURLE_TOO_MANY_REDIRECTS', 47);
define ('CURLE_UNKNOWN_TELNET_OPTION', 48);
define ('CURLE_TELNET_OPTION_SYNTAX', 49);
define ('CURLE_OBSOLETE', 50);
define ('CURLE_SSL_PEER_CERTIFICATE', 51);
define ('CURLE_GOT_NOTHING', 52);
define ('CURLE_SSL_ENGINE_NOTFOUND', 53);
define ('CURLE_SSL_ENGINE_SETFAILED', 54);
define ('CURLE_SEND_ERROR', 55);
define ('CURLE_RECV_ERROR', 56);
define ('CURLE_SHARE_IN_USE', 57);
define ('CURLE_SSL_CERTPROBLEM', 58);
define ('CURLE_SSL_CIPHER', 59);
define ('CURLE_SSL_CACERT', 60);
define ('CURLE_BAD_CONTENT_ENCODING', 61);
define ('CURLE_LDAP_INVALID_URL', 62);
define ('CURLE_FILESIZE_EXCEEDED', 63);
define ('CURLE_FTP_SSL_FAILED', 64);
define ('CURLPROXY_HTTP', 0);
define ('CURLPROXY_SOCKS5', 5);
define ('CURL_NETRC_OPTIONAL', 1);
define ('CURL_NETRC_IGNORED', 0);
define ('CURL_NETRC_REQUIRED', 2);
define ('CURL_HTTP_VERSION_NONE', 0);
define ('CURL_HTTP_VERSION_1_0', 1);
define ('CURL_HTTP_VERSION_1_1', 2);
define ('CURLM_CALL_MULTI_PERFORM', -1);
define ('CURLM_OK', 0);
define ('CURLM_BAD_HANDLE', 1);
define ('CURLM_BAD_EASY_HANDLE', 2);
define ('CURLM_OUT_OF_MEMORY', 3);
define ('CURLM_INTERNAL_ERROR', 4);
define ('CURLMSG_DONE', 1);

/**
 * Available since PHP 5.1.0
 * @link http://php.net/manual/en/curl.constants.php
 */
define ('CURLOPT_FTPSSLAUTH', 129);

/**
 * Available since PHP 5.1.0
 * @link http://php.net/manual/en/curl.constants.php
 */
define ('CURLFTPAUTH_DEFAULT', 0);

/**
 * Available since PHP 5.1.0
 * @link http://php.net/manual/en/curl.constants.php
 */
define ('CURLFTPAUTH_SSL', 1);

/**
 * Available since PHP 5.1.0
 * @link http://php.net/manual/en/curl.constants.php
 */
define ('CURLFTPAUTH_TLS', 2);

/**
 * Available since PHP 5.2.0
 * @link http://php.net/manual/en/curl.constants.php
 */
define ('CURLOPT_FTP_SSL', 119);

/**
 * Available since PHP 5.2.0
 * @link http://php.net/manual/en/curl.constants.php
 */
define ('CURLFTPSSL_NONE', 0);

/**
 * Available since PHP 5.2.0
 * @link http://php.net/manual/en/curl.constants.php
 */
define ('CURLFTPSSL_TRY', 1);

/**
 * Available since PHP 5.2.0
 * @link http://php.net/manual/en/curl.constants.php
 */
define ('CURLFTPSSL_CONTROL', 2);

/**
 * Available since PHP 5.2.0
 * @link http://php.net/manual/en/curl.constants.php
 */
define ('CURLFTPSSL_ALL', 3);

// End of curl v.
?>
