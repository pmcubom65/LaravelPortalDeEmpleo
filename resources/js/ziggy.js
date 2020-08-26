    var Ziggy = {
        namedRoutes: {"inicio":{"uri":"\/","methods":["POST"],"domain":null},"login":{"uri":"login","methods":["GET","HEAD"],"domain":null},"logout":{"uri":"logout","methods":["POST"],"domain":null},"register":{"uri":"register","methods":["GET","HEAD"],"domain":null},"password.request":{"uri":"password\/reset","methods":["GET","HEAD"],"domain":null},"password.email":{"uri":"password\/email","methods":["POST"],"domain":null},"password.reset":{"uri":"password\/reset\/{token}","methods":["GET","HEAD"],"domain":null},"password.update":{"uri":"password\/reset","methods":["POST"],"domain":null},"password.confirm":{"uri":"password\/confirm","methods":["GET","HEAD"],"domain":null},"apuntarse":{"uri":"search\/{id}","methods":["POST"],"domain":null},"editar":{"uri":"search\/{id}\/edit","methods":["POST"],"domain":null},"home":{"uri":"home","methods":["POST"],"domain":null},"Expe":{"uri":"home\/Expe\/{id}","methods":["POST"],"domain":null},"empresa":{"uri":"empresa\/{id}","methods":["POST"],"domain":null},"oferta":{"uri":"empresa\/{id}\/oferta","methods":["PUT","PATCH"],"domain":null},"contacto":{"uri":"empresa\/{id}\/published\/{ofertaid}\/trabajador\/{tid}","methods":["POST"],"domain":null},"publicada":{"uri":"empresa\/{id}\/published","methods":["GET","HEAD"],"domain":null},"candidatos":{"uri":"empresa\/{id}\/published\/{ofertaid}","methods":["PUT"],"domain":null},"cv":{"uri":"cv","methods":["GET","HEAD"],"domain":null}},
        baseUrl: 'http://127.0.0.1:8000',
        baseProtocol: 'http',
        baseDomain: 'localhost',
        basePort: false,
        defaultParameters: []
    };

    if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
        for (var name in window.Ziggy.namedRoutes) {
            Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
        }
    }

    export {
        Ziggy
    }
