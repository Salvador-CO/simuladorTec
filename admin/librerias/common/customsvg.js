var medCardShape = [
    {
        id: "main",
        name: "Nombre de la Organización",
        post: "Puesto",
    }
    
];

var flowShapeData = [
    {
        "id": "shape",
        "type": "mediumShape",
        "text": {
            title: { text: "Shape", "fontSize": 16, width: 45, lineHeight: 18, paddingTop: 12 },
            firstLine: "draw ()",
            secondLine: "resize ()",
            thirdLine: "rotate ()"
        },
        "x": 200,
        "y": 0,
        "fill": "#ceefe1",
        "stroke": "#B8C6D6",
        "extraLinesStroke": "#0AB169",
        "width": 140,
        "height": 140,
        "strokeWidth": 2,
        "fontColor": "#4D4D4D",
        "fontSize": 14,
        "textAlign": "center",
        "lineHeight": 20,
        "fontStyle": "normal",
        "textVerticalAlign": "center",
        "angle": 0,
        "strokeType": "line"
    },
    {
        "id": "triangle",
        "type": "smallShape",
        "text": {
            title: { text: "Triangle", "fontSize": 16, width: 57, paddingTop: 12 },
            firstLine: "draw ()"
        },
        "x": 200,
        "y": 220,
        "fill": "#ceefe1",
        "stroke": "#B8C6D6",
        "extraLinesStroke": "#0AB169",
        "width": 140,
        "height": 90,
        "strokeWidth": 2,
        "fontColor": "#4D4D4D",
        "fontSize": 14,
        "textAlign": "center",
        "lineHeight": 18,
        "fontStyle": "normal",
        "textVerticalAlign": "center",
        "angle": 0,
        "strokeType": "line"
    },
    {
        "id": "rectangle",
        "type": "largeShape",
        "text": {
            title: { text: "Rectangle", "fontSize": 16, width: 70, lineHeight: 18, paddingTop: 12 },
            firstLine: "draw ()",
            secondLine: "get/set width",
            thirdLine: "get/set height"
        },
        "x": 400,
        "y": 220,
        "fill": "#ceefe1",
        "stroke": "#B8C6D6",
        "extraLinesStroke": "#0AB169",
        "width": 140,
        "height": 156,
        "strokeWidth": 2,
        "fontColor": "#4D4D4D",
        "fontSize": 14,
        "textAlign": "center",
        "lineHeight": 20,
        "fontStyle": "normal",
        "textVerticalAlign": "center",
        "angle": 0,
        "strokeType": "line"
    },
    {
        "id": "circle",
        "type": "largeShape",
        "text": {
            title: { text: "Circle", "fontSize": 16, width: 40, lineHeight: 18, paddingTop: 12 },
            firstLine: "draw ()",
            secondLine: "get/set radius",
            thirdLine: "&lt;static&gt; PI"
        },
        "x": 0,
        "y": 220,
        "fill": "#ceefe1",
        "stroke": "#B8C6D6",
        "extraLinesStroke": "#0AB169",
        "width": 140,
        "height": 156,
        "strokeWidth": 2,
        "fontColor": "#4D4D4D",
        "fontSize": 14,
        "textAlign": "center",
        "lineHeight": 20,
        "fontStyle": "normal",
        "textVerticalAlign": "center",
        "angle": 0,
        "strokeType": "line"
    },
    {
        "id": "u1573906868425",
        "type": "line",
        "points": [
            {
                "x": 270,
                "y": 140
            },
            {
                "x": 270,
                "y": 220
            }
        ],
        "stroke": "#0AB169",
        "connectType": "straight",
        "strokeWidth": 2,
        "cornersRadius": 0,
        "width": 0,
        "height": 80,
        "x": 270,
        "y": 140,
        "from": "shape",
        "to": "triangle",
        "fromSide": "bottom",
        "toSide": "top",
        "strokeType": "line",
        "backArrow": "",
        "forwardArrow": "filled"
    },
    {
        "id": "u1573906868920",
        "type": "line",
        "points": [
            {
                "x": 270,
                "y": 140
            },
            {
                "x": 70,
                "y": 220
            }
        ],
        "stroke": "#0AB169",
        "connectType": "straight",
        "strokeWidth": 2,
        "cornersRadius": 0,
        "width": 200,
        "height": 80,
        "x": 270,
        "y": 140,
        "from": "shape",
        "to": "circle",
        "fromSide": "bottom",
        "toSide": "top",
        "strokeType": "line",
        "backArrow": "",
        "forwardArrow": "filled"
    },
    {
        "id": "u1573906869588",
        "type": "line",
        "points": [
            {
                "x": 270,
                "y": 140
            },
            {
                "x": 470,
                "y": 220
            }
        ],
        "stroke": "#0AB169",
        "connectType": "straight",
        "strokeWidth": 2,
        "cornersRadius": 0,
        "width": 200,
        "height": 80,
        "x": 270,
        "y": 140,
        "from": "shape",
        "to": "rectangle",
        "fromSide": "bottom",
        "toSide": "top",
        "strokeType": "line",
        "backArrow": "",
        "forwardArrow": "filled"
    }
];

var stickyNote = [
    {
        "id": 1,
        "x": 150,
        "y": 0,
        "type": "yellow",
        "text": "Measure",
    },
    {
        "id": 2,
        "x": 450,
        "y": 0,
        "type": "yellow",
        "text": "Idea"
    },
    {
        "id": 3,
        "x": 0,
        "y": 300,
        "type": "yellow",
        "text": "Implement"
    },
    {
        "id": 4,
        "x": 300,
        "y": 600,
        "type": "yellow",
        "text": "Plan",
    },
    {
        "id": 5,
        "x": 600,
        "y": 300,
        "type": "yellow",
        "text": "Market research",
    },
    {
        "id": 6,
        "x": 300,
        "y": 300,
        "type": "blue",
        "text": "Product\ndevelopment",
    },
    {
        "id": 7,
        "connectType": "elbow",
        "forwardArrow": "filled",
        "from": 1,
        "to": 2,
        "stroke": "#8792A7"
    },
    {
        "id": 8,
        "connectType": "elbow",
        "forwardArrow": "filled",
        "from": 5,
        "to": 4,
        "fromSide": "bottom",
        "stroke": "#8792A7",
    },
    {
        "id": 9,
        "connectType": "elbow",
        "forwardArrow": "filled",
        "from": 4,
        "to": 3,
        "fromSide": "left",
        "toSide": "bottom",
        "stroke": "#8792A7"
    },
    {
        "id": 10,
        "connectType": "elbow",
        "backArrow": "filled",
        "from": 1,
        "to": 3,
        "fromSide": "left",
        "toSide": "top",
        "type": "line",
        "stroke": "#8792A7"
    },
    {
        "id": 11,
        "connectType": "elbow",
        "forwardArrow": "filled",
        "from": 2,
        "to": 5,
        "fromSide": "right",
        "toSide": "top",
        "type": "line",
        "stroke": "#8792A7"
    }
]

var networkDiagram = [
	{
		"id": 1,
		"type": "networkCard",
		"x": 0,
		"y": 380,
		"img": "../common/img/network_image/desktop.svg",
		"text": "Remote expert desktop",
		"ip": "192.168.32.2"
	},
	{
		"id": 2,
		"type": "networkCard",
		"x": 200,
		"y": 0,
		"img": "../common/img/network_image/cloud.svg",
		"text": "NGNIX",
		"ip": "192.168.1.4"
	},
	{
		"id": 3,
		"type": "networkCard",
		"x": 0,
		"y": 190,
		"img": "../common/img/network_image/fieldWorker.svg",
		"text": "User: Field Worker",
		"ip": "192.168.1.5"
	},
	{
		"id": 4,
		"type": "networkCard",
		"x": 200,
		"y": 190,
		"img": "../common/img/network_image/server.svg",
		"text": "Storage Server",
		"ip": "192.168.1.6"
	},
	{
		"id": 5,
		"type": "networkCard",
		"x": 420,
		"y": 190,
		"img": "../common/img/network_image/server.svg",
		"text": "Event server",
		"ip": "192.168.1.8"
	},
	{
		"id": 6,
		"type": "networkCard",
		"x": 620,
		"y": 190,
		"img": "../common/img/network_image/server.svg",
		"text": "PUB/SUB Server",
		"ip": "192.168.1.9"
	},
	{
		"id": 7,
		"type": "networkCard",
		"x": 820,
		"y": 190,
		"img": "../common/img/network_image/server.svg",
		"text": "API Server",
		"ip": "192.168.1.10"
	},
	{
		"id": 8,
		"type": "networkCard",
		"x": 1010,
		"y": 190,
		"img": "../common/img/network_image/server.svg",
		"text": "STUN/TURN Server",
		"ip": "192.168.1.13"
	},
	{
		"id": 9,
		"type": "networkCard",
		"x": 200,
		"y": 380,
		"img": "../common/img/network_image/cloud.svg",
		"text": "AWS S3",
		"ip": "192.168.1.7"
	},
	{
		"id": 10,
		"type": "networkCard",
		"x": 820,
		"y": 390,
		"img": "../common/img/network_image/database.svg",
		"text": "Database postgre SQL",
		"ip": "192.168.1.11"
	},
	{
		"id": 11,
		"type": "networkCard",
		"x": 0,
		"y": 0,
		"img": "../common/img/network_image/core.svg",
		"text": "Intel MCU",
		"ip": "192.168.1.12"
	},
	{
		"id": "u1584430649613",
		"type": "line",
		"from": 4,
		"to": 9,
		"fromSide": "bottom",
		"toSide": "top",
		"connectType": "elbow",
		"strokeType": "line",
		"backArrow": "",
		"forwardArrow": "filled"
	},
	{
		"id": "u1584430650668",
		"type": "line",
		"from": 5,
		"to": 6,
		"fromSide": "right",
		"toSide": "left",
		"connectType": "elbow",
		"strokeType": "line",
		"backArrow": "filled",
		"forwardArrow": "filled"
	},
	{
		"id": "u1584430650861",
		"type": "line",
		"from": 6,
		"to": 7,
		"fromSide": "right",
		"toSide": "left",
		"connectType": "elbow",
		"strokeType": "line",
		"backArrow": "filled",
		"forwardArrow": "filled"
	},
	{
		"id": "u1585207090629",
		"type": "line",
		"connectType": "elbow",
		"from": 2,
		"to": 5,
		"fromSide": "right",
		"toSide": "top",
		"strokeType": "line",
		"backArrow": "filled",
		"forwardArrow": "filled"
	},
	{
		"id": "u1585207092274",
		"type": "line",
		"connectType": "elbow",
		"from": 2,
		"to": 8,
		"fromSide": "right",
		"toSide": "top",
		"strokeType": "line",
		"backArrow": "filled",
		"forwardArrow": "filled"
	},
	{
		"id": "u1585207093512",
		"type": "line",
		"connectType": "elbow",
		"from": 3,
		"to": 2,
		"fromSide": "right",
		"toSide": "left",
		"strokeType": "line",
		"backArrow": "filled",
		"forwardArrow": "filled"
	},
	{
		"id": "u1585207094682",
		"type": "line",
		"connectType": "elbow",
		"from": 2,
		"to": 4,
		"fromSide": "bottom",
		"toSide": "top",
		"strokeType": "line",
		"backArrow": "",
		"forwardArrow": "filled"
	},
	{
		"id": "u1585207095202",
		"type": "line",
		"connectType": "elbow",
		"from": 2,
		"to": 7,
		"fromSide": "right",
		"toSide": "top",
		"strokeType": "line",
		"backArrow": "",
		"forwardArrow": "filled"
	},
	{
		"id": "u1585207096551",
		"type": "line",
		"connectType": "elbow",
		"from": 2,
		"to": 6,
		"fromSide": "right",
		"toSide": "top",
		"strokeType": "line",
		"backArrow": "filled",
		"forwardArrow": "filled"
	},
	{
		"id": "u1585207097624",
		"type": "line",
		"connectType": "elbow",
		"from": 7,
		"to": 10,
		"fromSide": "bottom",
		"toSide": "top",
		"strokeType": "line",
		"backArrow": "",
		"forwardArrow": "filled"
	},
	{
		"id": "u1585207098776",
		"type": "line",
		"connectType": "elbow",
		"from": 2,
		"to": 11,
		"fromSide": "left",
		"toSide": "right",
		"strokeType": "line",
		"backArrow": "",
		"forwardArrow": "filled"
	},
	{
		"id": "u1585207099109",
		"type": "line",
		"connectType": "elbow",
		"from": 2,
		"to": 1,
		"fromSide": "left",
		"toSide": "right",
		"strokeType": "line",
		"backArrow": "",
		"forwardArrow": "filled"
	}
];

var venDiagram = [
    {
        "id": "1",
        "type": "Ellipse",
        "x": 130,
		"y": 10,
        "fill": "#34B3E7",
    },
    {
        "id": "2",
		"type": "Ellipse",
        "x": 50,
        "y": 120,
        "fill": "#5055FA",
    },
    {
        "id": "3",
		"type": "Ellipse",
        "x": 190,
        "y": 120,
        "fill": "#F6F631",
    },
    {
        "id": "4",
        "type": "text",
        "text": "Good",
        "x": 230,
        "y": 70,
        "width": 40,
        "height": 16,
        "lineHeight": 14,
        "fontSize": "16",
        "fontColor": "rgba(0,0,0,0.70)",
        "textAlign": "center",
        "fontStyle": "normal",
        "textVerticalAlign": "center",
        "angle": 0,
        "fontWeight": "bold"
    },
    {
        "id": "5",
        "type": "text",
        "text": "Slow",
        "x": 160,
        "y": 160,
        "width": 34,
        "height": 16,
        "lineHeight": 14,
        "fontSize": 14,
        "fontColor": "rgba(0,0,0,0.70)",
        "textAlign": "center",
        "fontStyle": "normal",
        "textVerticalAlign": "center"
    },
    {
        "id": "6",
        "type": "text",
        "text": "Expensive",
        "x": 280,
        "y": 160,
        "width": 69,
        "height": 16,
        "lineHeight": 14,
        "fontSize": 14,
        "fontColor": "rgba(0,0,0,0.70)",
        "textAlign": "center",
        "fontStyle": "normal",
        "textVerticalAlign": "center"
    },
    {
        "id": "7",
        "type": "text",
        "text": "Low \nquality",
        "x": 220,
        "y": 260,
        "width": 45,
        "height": 29,
        "lineHeight": 14,
        "fontSize": 14,
        "fontColor": "rgba(0,0,0,0.70)",
        "textAlign": "center",
        "fontStyle": "normal",
        "textVerticalAlign": "center"
    },
    {
        "id": "8",
        "type": "text",
        "text": "Fast",
        "x": 350,
        "y": 250,
        "width": 31,
        "height": 16,
        "lineHeight": 14,
        "fontSize": "16",
        "fontColor": "rgba(0,0,0,0.70)",
        "textAlign": "center",
        "fontStyle": "normal",
        "textVerticalAlign": "center",
        "angle": 0,
        "fontWeight": "bold"
    },
    {
        "id": "9",
        "type": "text",
        "text": "Cheap",
        "x": 100,
        "y": 250,
        "width": 46,
        "height": 16,
        "lineHeight": 14,
        "fontSize": "16",
        "fontColor": "rgba(0,0,0,0.70)",
        "textAlign": "center",
        "fontStyle": "normal",
        "textVerticalAlign": "center",
        "angle": 0,
        "fontWeight": "bold"
    },
    {
        "id": "10",
        "type": "text",
        "text": "Dream",
        "x": 220,
        "y": 200,
        "width": 46,
        "height": 16,
        "lineHeight": 14,
        "fontSize": 14,
        "fontColor": "rgba(0,0,0,0.70)",
        "textAlign": "center",
        "fontStyle": "normal",
        "textVerticalAlign": "center"
    }
];

var htmlData = [
    {
        id: "s1",
        type: "template",
        title: "Shape",
        text: ["draw()", "resize()", "rotate()"],

        x: 200, y: 0, width: 140, height: 140,
    },
    {
        id: "s2",
        type: "template",
        title: "Triangle",
        text:["draw()"],

        x: 200, y: 220, width: 140, height: 90,
    },
    {
        id: "s3",
        type: "template",
        title: "Rectangle",
        text:["draw()", "get/set width", "get/set height"],

        x: 400, y: 220, width: 140, height: 140,
    },
    {
        id: "s4",
        type: "template",
        title: "Circle",
        text:["draw()", "get/set radius", "&lt;static&gt; PI"],

        x: 0, y: 220, width: 140, height: 140,
    },
    {
        type: "line",
        stroke: "#0AB169",
        from: "s1",
        to: "s2",
        fromSide: "bottom",
        toSide: "top",
        forwardArrow: "filled"
    },
    {
        type: "line",
        stroke: "#0AB169",
        connectType: "straight",
        from: "s1",
        to: "s4",
        fromSide: "bottom",
        toSide: "top",
        forwardArrow: "filled"
    },
    {
        type: "line",
        stroke: "#0AB169",
        connectType: "straight",
        from: "s1",
        to: "s3",
        fromSide: "bottom",
        toSide: "top",
        forwardArrow: "filled"
    }
];

var fullHtmlData = [
    {
        id: "s1",
        type: "template",
        title: "Shape",
        text: ["draw()", "resize()", "rotate()"],
        fill: "#CEEFE1",
        stroke: "#0AB169",
        strokeWidth: 2,

        x: 200, y: 0, width: 140, height: 140,
    },
    {
        id: "s2",
        type: "template",
        title: "Triangle",
        text:["draw()"],
        fill: "#CEEFE1",
        stroke: "#0AB169",
        strokeWidth: 2,

        x: 200, y: 220, width: 140, height: 90,
    },
    {
        id: "s3",
        type: "template",
        title: "Rectangle",
        text:["draw()", "get/set width", "get/set height"],
        fill: "#CEEFE1",
        stroke: "#0AB169",
        strokeWidth: 2,

        x: 400, y: 220, width: 140, height: 140,
    },
    {
        id: "s4",
        type: "template",
        title: "Circle",
        text:["draw()", "get/set radius", "&lt;static&gt; PI"],
        fill: "#CEEFE1",
        stroke: "#0AB169",
        strokeWidth: 2,

        x: 0, y: 220, width: 140, height: 140,
    },
    {
        type: "line",
        stroke: "#0AB169",
        from: "s1",
        to: "s2",
        fromSide: "bottom",
        toSide: "top",
        forwardArrow: "filled"
    },
    {
        type: "line",
        stroke: "#0AB169",
        connectType: "straight",
        from: "s1",
        to: "s4",
        fromSide: "bottom",
        toSide: "top",
        forwardArrow: "filled"
    },
    {
        type: "line",
        stroke: "#0AB169",
        connectType: "straight",
        from: "s1",
        to: "s3",
        fromSide: "bottom",
        toSide: "top",
        forwardArrow: "filled"
    }
];

var imgTemplateData = [
    {
        "id": "s1",
        "type": "template",
        "title": "Milena Hunter",
        "post": "Attending physician",
        "phone": "(124) 622-1256",
        "email": "mhunter@gmail.com",
        "img": "../common/big_img/big-avatar-25.jpg",

        "x": 400, "y": 0, "height": 115, "width": 330
    },
    {
        "id": "s2",
        "type": "template",
        "title": "Bradley Sutton",
        "post": "Fellow",
        "phone": "(325) 154-6232",
        "email": "bsutton@gmail.com",
        "img": "../common/big_img/big-avatar-26.jpg",

        "x": 400, "y": 160, "height": 115, "width": 330
    }
];
