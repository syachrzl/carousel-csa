<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carousel - CSA</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('adminlte') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('adminlte') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('adminlte') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url('adminlte') ?>/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('adminlte') ?>/dist/css/adminlte.min.css?v=3.2.0">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('adminlte') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('adminlte') ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('adminlte') ?>/plugins/summernote/summernote-bs4.min.css">
    <script data-cfasync="false" nonce="da986321-d684-4b3e-944d-8d3f668bc8d4">
        try {
            (function(w, d) {
                ! function(bz, bA, bB, bC) {
                    if (bz.zaraz) console.error("zaraz is loaded twice");
                    else {
                        bz[bB] = bz[bB] || {};
                        bz[bB].executed = [];
                        bz.zaraz = {
                            deferred: [],
                            listeners: []
                        };
                        bz.zaraz._v = "5853";
                        bz.zaraz._n = "da986321-d684-4b3e-944d-8d3f668bc8d4";
                        bz.zaraz.q = [];
                        bz.zaraz._f = function(bD) {
                            return async function() {
                                var bE = Array.prototype.slice.call(arguments);
                                bz.zaraz.q.push({
                                    m: bD,
                                    a: bE
                                })
                            }
                        };
                        for (const bF of ["track", "set", "debug"]) bz.zaraz[bF] = bz.zaraz._f(bF);
                        bz.zaraz.init = () => {
                            var bG = bA.getElementsByTagName(bC)[0],
                                bH = bA.createElement(bC),
                                bI = bA.getElementsByTagName("title")[0];
                            bI && (bz[bB].t = bA.getElementsByTagName("title")[0].text);
                            bz[bB].x = Math.random();
                            bz[bB].w = bz.screen.width;
                            bz[bB].h = bz.screen.height;
                            bz[bB].j = bz.innerHeight;
                            bz[bB].e = bz.innerWidth;
                            bz[bB].l = bz.location.href;
                            bz[bB].r = bA.referrer;
                            bz[bB].k = bz.screen.colorDepth;
                            bz[bB].n = bA.characterSet;
                            bz[bB].o = (new Date).getTimezoneOffset();
                            if (bz.dataLayer)
                                for (const bJ of Object.entries(Object.entries(dataLayer).reduce(((bK, bL) => ({
                                        ...bK[1],
                                        ...bL[1]
                                    })), {}))) zaraz.set(bJ[0], bJ[1], {
                                    scope: "page"
                                });
                            bz[bB].q = [];
                            for (; bz.zaraz.q.length;) {
                                const bM = bz.zaraz.q.shift();
                                bz[bB].q.push(bM)
                            }
                            bH.defer = !0;
                            for (const bN of [localStorage, sessionStorage]) Object.keys(bN || {}).filter((bP => bP.startsWith("_zaraz_"))).forEach((bO => {
                                try {
                                    bz[bB]["z_" + bO.slice(7)] = JSON.parse(bN.getItem(bO))
                                } catch {
                                    bz[bB]["z_" + bO.slice(7)] = bN.getItem(bO)
                                }
                            }));
                            bH.referrerPolicy = "origin";
                            bH.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bz[bB])));
                            bG.parentNode.insertBefore(bH, bG)
                        };
                        ["complete", "interactive"].includes(bA.readyState) ? zaraz.init() : bz.addEventListener("DOMContentLoaded", zaraz.init)
                    }
                }(w, d, "zarazData", "script");
                window.zaraz._p = async dq => new Promise((dr => {
                    if (dq) {
                        dq.e && dq.e.forEach((ds => {
                            try {
                                const dt = d.querySelector("script[nonce]"),
                                    du = dt?.nonce || dt?.getAttribute("nonce"),
                                    dv = d.createElement("script");
                                du && (dv.nonce = du);
                                dv.innerHTML = ds;
                                dv.onload = () => {
                                    d.head.removeChild(dv)
                                };
                                d.head.appendChild(dv)
                            } catch (dw) {
                                console.error(`Error executing script: ${ds}\n`, dw)
                            }
                        }));
                        Promise.allSettled((dq.f || []).map((dx => fetch(dx[0], dx[1]))))
                    }
                    dr()
                }));
                zaraz._p({
                    "e": ["(function(w,d){})(window,document)"]
                });
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
</head>