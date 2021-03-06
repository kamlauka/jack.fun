/*!
 * VERSION: 0.1.3
 * DATE: 2017-03-29
 * UPDATES AND DOCS AT: http://greensock.com
 *
 * @license Copyright (c) 2008-2017, GreenSock. All rights reserved.
 * DrawSVGPlugin is a Club GreenSock membership benefit; You must have a valid membership to use
 * this code without violating the terms of use. Visit http://greensock.com/club/ to sign up or get more details.
 * This work is subject to the software agreement that was issued with your membership.
 *
 * @author: Jack Doyle, jack@greensock.com
 */
var _gsScope = "undefined" != typeof module && module.exports && "undefined" != typeof global ? global : this || window;

(_gsScope._gsQueue || (_gsScope._gsQueue = [])).push(function() {
    "use strict";
    function e(e, t, o, r, n, i) {
        return o = (parseFloat(o) - parseFloat(e)) * n, r = (parseFloat(r) - parseFloat(t)) * i, 
        Math.sqrt(o * o + r * r);
    }
    function t(e) {
        return "string" != typeof e && e.nodeType || (e = _gsScope.TweenLite.selector(e), 
        e.length && (e = e[0])), e;
    }
    function o(e, t, o) {
        var r, n, i = e.indexOf(" ");
        return -1 === i ? (r = void 0 !== o ? o + "" : e, n = e) : (r = e.substr(0, i), 
        n = e.substr(i + 1)), r = -1 !== r.indexOf("%") ? parseFloat(r) / 100 * t : parseFloat(r), 
        n = -1 !== n.indexOf("%") ? parseFloat(n) / 100 * t : parseFloat(n), r > n ? [ n, r ] : [ r, n ];
    }
    function r(o) {
        if (!o) return 0;
        o = t(o);
        var r, n, i, s, a, f, g, u = o.tagName.toLowerCase(), d = 1, c = 1;
        "non-scaling-stroke" === o.getAttribute("vector-effect") && (c = o.getScreenCTM(), 
        d = c.a, c = c.d);
        try {
            n = o.getBBox();
        } catch (l) {}
        if (n && (n.width || n.height) || "rect" !== u && "circle" !== u && "ellipse" !== u || (n = {
            width: parseFloat(o.getAttribute("rect" === u ? "width" : "circle" === u ? "r" : "rx")),
            height: parseFloat(o.getAttribute("rect" === u ? "height" : "circle" === u ? "r" : "ry"))
        }, "rect" !== u && (n.width *= 2, n.height *= 2)), "path" === u) s = o.style.strokeDasharray, 
        o.style.strokeDasharray = "none", r = o.getTotalLength() || 0, d !== c && console.log("Warning: <path> length cannot be measured accurately when vector-effect is non-scaling-stroke and the element isn't proportionally scaled."), 
        r *= (d + c) / 2, o.style.strokeDasharray = s; else if ("rect" === u) r = 2 * n.width * d + 2 * n.height * c; else if ("line" === u) r = e(o.getAttribute("x1"), o.getAttribute("y1"), o.getAttribute("x2"), o.getAttribute("y2"), d, c); else if ("polyline" === u || "polygon" === u) for (i = o.getAttribute("points").match(h) || [], 
        "polygon" === u && i.push(i[0], i[1]), r = 0, a = 2; a < i.length; a += 2) r += e(i[a - 2], i[a - 1], i[a], i[a + 1], d, c) || 0; else ("circle" === u || "ellipse" === u) && (f = n.width / 2 * d, 
        g = n.height / 2 * c, r = Math.PI * (3 * (f + g) - Math.sqrt((3 * f + g) * (f + 3 * g))));
        return r || 0;
    }
    function n(e, o) {
        if (!e) return [ 0, 0 ];
        e = t(e), o = o || r(e) + 1;
        var n = a(e), i = n.strokeDasharray || "", s = parseFloat(n.strokeDashoffset), h = i.indexOf(",");
        return 0 > h && (h = i.indexOf(" ")), i = 0 > h ? o : parseFloat(i.substr(0, h)) || 1e-5, 
        i > o && (i = o), [ Math.max(0, -s), Math.max(0, i - s) ];
    }
    var i, s = _gsScope.document, a = s.defaultView ? s.defaultView.getComputedStyle : function() {}, h = /(?:(-|-=|\+=)?\d*\.?\d*(?:e[\-+]?\d+)?)[0-9]/gi, f = -1 !== ((_gsScope.navigator || {}).userAgent || "").indexOf("Edge"), g = "codepen", u = "DrawSVGPlugin", d = String.fromCharCode(103, 114, 101, 101, 110, 115, 111, 99, 107, 46, 99, 111, 109), c = String.fromCharCode(47, 114, 101, 113, 117, 105, 114, 101, 115, 45, 109, 101, 109, 98, 101, 114, 115, 104, 105, 112, 47), l = function(e) {
        for (var t = -1 !== (window ? window.location.href : "").indexOf(String.fromCharCode(103, 114, 101, 101, 110, 115, 111, 99, 107)) && -1 !== e.indexOf(String.fromCharCode(108, 111, 99, 97, 108, 104, 111, 115, 116)), o = [ d, String.fromCharCode(99, 111, 100, 101, 112, 101, 110, 46, 105, 111), String.fromCharCode(99, 111, 100, 101, 112, 101, 110, 46, 100, 101, 118), String.fromCharCode(99, 115, 115, 45, 116, 114, 105, 99, 107, 115, 46, 99, 111, 109), String.fromCharCode(99, 100, 112, 110, 46, 105, 111), String.fromCharCode(103, 97, 110, 110, 111, 110, 46, 116, 118), String.fromCharCode(99, 111, 100, 101, 99, 97, 110, 121, 111, 110, 46, 110, 101, 116), String.fromCharCode(116, 104, 101, 109, 101, 102, 111, 114, 101, 115, 116, 46, 110, 101, 116), String.fromCharCode(99, 101, 114, 101, 98, 114, 97, 120, 46, 99, 111, 46, 117, 107), String.fromCharCode(116, 121, 109, 112, 97, 110, 117, 115, 46, 110, 101, 116), String.fromCharCode(116, 119, 101, 101, 110, 109, 97, 120, 46, 99, 111, 109), String.fromCharCode(116, 119, 101, 101, 110, 108, 105, 116, 101, 46, 99, 111, 109), String.fromCharCode(112, 108, 110, 107, 114, 46, 99, 111), String.fromCharCode(104, 111, 116, 106, 97, 114, 46, 99, 111, 109), String.fromCharCode(119, 101, 98, 112, 97, 99, 107, 98, 105, 110, 46, 99, 111, 109), String.fromCharCode(106, 115, 102, 105, 100, 100, 108, 101, 46, 110, 101, 116) ], r = o.length; --r > -1; ) if (-1 !== e.indexOf(o[r])) return !0;
        return t && window && window.console && console.log(String.fromCharCode(87, 65, 82, 78, 73, 78, 71, 58, 32, 97, 32, 115, 112, 101, 99, 105, 97, 108, 32, 118, 101, 114, 115, 105, 111, 110, 32, 111, 102, 32) + u + String.fromCharCode(32, 105, 115, 32, 114, 117, 110, 110, 105, 110, 103, 32, 108, 111, 99, 97, 108, 108, 121, 44, 32, 98, 117, 116, 32, 105, 116, 32, 119, 105, 108, 108, 32, 110, 111, 116, 32, 119, 111, 114, 107, 32, 111, 110, 32, 97, 32, 108, 105, 118, 101, 32, 100, 111, 109, 97, 105, 110, 32, 98, 101, 99, 97, 117, 115, 101, 32, 105, 116, 32, 105, 115, 32, 97, 32, 109, 101, 109, 98, 101, 114, 115, 104, 105, 112, 32, 98, 101, 110, 101, 102, 105, 116, 32, 111, 102, 32, 67, 108, 117, 98, 32, 71, 114, 101, 101, 110, 83, 111, 99, 107, 46, 32, 80, 108, 101, 97, 115, 101, 32, 115, 105, 103, 110, 32, 117, 112, 32, 97, 116, 32, 104, 116, 116, 112, 58, 47, 47, 103, 114, 101, 101, 110, 115, 111, 99, 107, 46, 99, 111, 109, 47, 99, 108, 117, 98, 47, 32, 97, 110, 100, 32, 116, 104, 101, 110, 32, 100, 111, 119, 110, 108, 111, 97, 100, 32, 116, 104, 101, 32, 39, 114, 101, 97, 108, 39, 32, 118, 101, 114, 115, 105, 111, 110, 32, 102, 114, 111, 109, 32, 121, 111, 117, 114, 32, 71, 114, 101, 101, 110, 83, 111, 99, 107, 32, 97, 99, 99, 111, 117, 110, 116, 32, 119, 104, 105, 99, 104, 32, 104, 97, 115, 32, 110, 111, 32, 115, 117, 99, 104, 32, 108, 105, 109, 105, 116, 97, 116, 105, 111, 110, 115, 46, 32, 84, 104, 101, 32, 102, 105, 108, 101, 32, 121, 111, 117, 39, 114, 101, 32, 117, 115, 105, 110, 103, 32, 119, 97, 115, 32, 108, 105, 107, 101, 108, 121, 32, 100, 111, 119, 110, 108, 111, 97, 100, 101, 100, 32, 102, 114, 111, 109, 32, 101, 108, 115, 101, 119, 104, 101, 114, 101, 32, 111, 110, 32, 116, 104, 101, 32, 119, 101, 98, 32, 97, 110, 100, 32, 105, 115, 32, 114, 101, 115, 116, 114, 105, 99, 116, 101, 100, 32, 116, 111, 32, 108, 111, 99, 97, 108, 32, 117, 115, 101, 32, 111, 114, 32, 111, 110, 32, 115, 105, 116, 101, 115, 32, 108, 105, 107, 101, 32, 99, 111, 100, 101, 112, 101, 110, 46, 105, 111, 46)), 
        t;
    }(window ? window.location.host : "");
    i = _gsScope._gsDefine.plugin({
        propName: "drawSVG",
        API: 2,
        version: "0.1.3",
        global: !0,
        overwriteProps: [ "drawSVG" ],
        init: function(e, t, i, s) {
            if (!e.getBBox) return !1;
            if (!l) return window.location.href = "http://" + d + c + "?plugin=" + u + "&source=" + g, 
            !1;
            var h, C, p, m, S = r(e) + 1;
            return this._style = e.style, "function" == typeof t && (t = t(s, e)), t === !0 || "true" === t ? t = "0 100%" : t ? -1 === (t + "").indexOf(" ") && (t = "0 " + t) : t = "0 0", 
            h = n(e, S), C = o(t, S, h[0]), this._length = S + 10, 0 === h[0] && 0 === C[0] ? (p = Math.max(1e-5, C[1] - S), 
            this._dash = S + p, this._offset = S - h[1] + p, this._addTween(this, "_offset", this._offset, S - C[1] + p, "drawSVG")) : (this._dash = h[1] - h[0] || 1e-6, 
            this._offset = -h[0], this._addTween(this, "_dash", this._dash, C[1] - C[0] || 1e-5, "drawSVG"), 
            this._addTween(this, "_offset", this._offset, -C[0], "drawSVG")), f && (m = a(e), 
            C = m.strokeLinecap, "butt" !== C && C !== m.strokeLinejoin && (C = parseFloat(m.strokeMiterlimit), 
            this._addTween(e.style, "strokeMiterlimit", C, C + 1e-4, "strokeMiterlimit"))), 
            l;
        },
        set: function(e) {
            this._firstPT && (this._super.setRatio.call(this, e), this._style.strokeDashoffset = this._offset, 
            this._style.strokeDasharray = 1 === e || 0 === e ? this._offset < .001 && this._length - this._dash <= 10 ? "none" : this._offset === this._dash ? "0px, 999999px" : this._dash + "px," + this._length + "px" : this._dash + "px," + this._length + "px");
        }
    }), i.getLength = r, i.getPosition = n;
}), _gsScope._gsDefine && _gsScope._gsQueue.pop()(), function(e) {
    "use strict";
    var t = function() {
        return (_gsScope.GreenSockGlobals || _gsScope)[e];
    };
    "function" == typeof define && define.amd ? define([ "TweenLite" ], t) : "undefined" != typeof module && module.exports && (require("../TweenLite.js"), 
    module.exports = t());
}("DrawSVGPlugin");