/*
 Highcharts JS v6.0.7 (2018-02-16)

 (c) 2014 Highsoft AS
 Authors: Jon Arild Nygard / Oystein Moseng

 License: www.highcharts.com/license
*/
(function(p){"object"===typeof module&&module.exports?module.exports=p:p(Highcharts)})(function(p){var F=function(b){var p=b.each,w=b.extend,l=b.isArray,v=b.isObject,q=b.isNumber,A=b.merge,y=b.pick,f=b.reduce;return{getColor:function(b,f){var r=f.mapOptionsToLevel,m=f.parentColorIndex,B=f.series,g=f.colors,n=B.points,C,l;b&&(n=n[b.i],r=r[b.level]||{},(b=n&&r.colorByPoint)&&(C=n.index%(g?g.length:B.chart.options.chart.colorCount)),l=y(n&&n.options.colorIndex,r&&r.colorIndex,C,m,f.colorIndex));return{color:void 0,
colorIndex:l}},getLevelOptions:function(b){var p=null,r,m,z,g;if(v(b))for(p={},z=q(b.from)?b.from:1,g=b.levels,m={},r=v(b.defaults)?b.defaults:{},l(g)&&(m=f(g,function(b,f){var g,m;v(f)&&q(f.level)&&(m=A({},f),g="boolean"===typeof m.levelIsConstant?m.levelIsConstant:r.levelIsConstant,delete m.levelIsConstant,delete m.level,f=f.level+(g?0:z-1),v(b[f])?w(b[f],m):b[f]=m);return b},{})),g=q(b.to)?b.to:1,b=0;b<=g;b++)p[b]=A({},r,v(m[b])?m[b]:{});return p},setTreeValues:function E(b,f){var m=f.before,g=
f.idRoot,n=f.mapIdToNode[g],l=f.points[b.i],r=l&&l.options||{},q=0,v=[];w(b,{levelDynamic:b.level-(("boolean"===typeof f.levelIsConstant?f.levelIsConstant:1)?0:n.level),name:y(l&&l.name,""),visible:g===b.id||("boolean"===typeof f.visible?f.visible:!1)});"function"===typeof m&&(b=m(b,f));p(b.children,function(a,c){var d=w({},f);w(d,{index:c,siblings:b.children.length,visible:b.visible});a=E(a,d);v.push(a);a.visible&&(q+=a.val)});b.visible=0<q||b.visible;m=y(r.value,q);w(b,{children:v,childrenTotal:q,
isLeaf:b.visible&&!q,val:m});return b}}}(p);(function(b,p){var w=b.seriesType,l=b.seriesTypes,v=b.map,q=b.merge,A=b.extend,y=b.noop,f=b.each,B=p.getColor,E=p.getLevelOptions,r=b.grep,m=b.isNumber,z=b.isString,g=b.pick,n=b.Series,C=b.stableSort,F=function(a,c,d){d=d||this;b.objectEach(a,function(b,e){c.call(d,b,e,a)})},I=b.reduce,D=function(a,c,d){d=d||this;a=c.call(d,a);!1!==a&&D(a,c,d)};w("treemap","scatter",{showInLegend:!1,marker:!1,colorByPoint:!1,dataLabels:{enabled:!0,defer:!1,verticalAlign:"middle",
formatter:function(){return this.point.name||this.point.id},inside:!0},tooltip:{headerFormat:"",pointFormat:"\x3cb\x3e{point.name}\x3c/b\x3e: {point.value}\x3cbr/\x3e"},ignoreHiddenPoint:!0,layoutAlgorithm:"sliceAndDice",layoutStartingDirection:"vertical",alternateStartingDirection:!1,levelIsConstant:!0,drillUpButton:{position:{align:"right",x:-10,y:10}}},{pointArrayMap:["value"],axisTypes:l.heatmap?["xAxis","yAxis","colorAxis"]:["xAxis","yAxis"],directTouch:!0,optionalAxis:"colorAxis",getSymbol:y,
parallelArrays:["x","y","value","colorValue"],colorKey:"colorValue",translateColors:l.heatmap&&l.heatmap.prototype.translateColors,colorAttribs:l.heatmap&&l.heatmap.prototype.colorAttribs,trackerGroups:["group","dataLabelsGroup"],getListOfParents:function(a,c){a=I(a||[],function(a,c,b){c=g(c.parent,"");void 0===a[c]&&(a[c]=[]);a[c].push(b);return a},{});F(a,function(a,t,e){""!==t&&-1===b.inArray(t,c)&&(f(a,function(a){e[""].push(a)}),delete e[t])});return a},getTree:function(){var a=v(this.data,function(a){return a.id}),
a=this.getListOfParents(this.data,a);this.nodeMap=[];return this.buildNode("",-1,0,a,null)},init:function(a,c){n.prototype.init.call(this,a,c);this.options.allowDrillToNode&&b.addEvent(this,"click",this.onClickDrillToNode)},buildNode:function(a,c,d,b,e){var k=this,t=[],h=k.points[c],G=0,H;f(b[a]||[],function(c){H=k.buildNode(k.points[c].id,c,d+1,b,a);G=Math.max(H.height+1,G);t.push(H)});c={id:a,i:c,children:t,height:G,level:d,parent:e,visible:!1};k.nodeMap[c.id]=c;h&&(h.node=c);return c},setTreeValues:function(a){var c=
this,d=c.options,b=c.nodeMap[c.rootNode],d="boolean"===typeof d.levelIsConstant?d.levelIsConstant:!0,e=0,k=[],x,h=c.points[a.i];f(a.children,function(a){a=c.setTreeValues(a);k.push(a);a.ignore||(e+=a.val)});C(k,function(a,c){return a.sortIndex-c.sortIndex});x=g(h&&h.options.value,e);h&&(h.value=x);A(a,{children:k,childrenTotal:e,ignore:!(g(h&&h.visible,!0)&&0<x),isLeaf:a.visible&&!e,levelDynamic:a.level-(d?0:b.level),name:g(h&&h.name,""),sortIndex:g(h&&h.sortIndex,-x),val:x});return a},calculateChildrenAreas:function(a,
c){var d=this,b=d.options,e=d.mapOptionsToLevel[a.level+1],k=g(d[e&&e.layoutAlgorithm]&&e.layoutAlgorithm,b.layoutAlgorithm),x=b.alternateStartingDirection,h=[];a=r(a.children,function(a){return!a.ignore});e&&e.layoutStartingDirection&&(c.direction="vertical"===e.layoutStartingDirection?0:1);h=d[k](c,a);f(a,function(a,b){b=h[b];a.values=q(b,{val:a.childrenTotal,direction:x?1-c.direction:c.direction});a.pointValues=q(b,{x:b.x/d.axisRatio,width:b.width/d.axisRatio});a.children.length&&d.calculateChildrenAreas(a,
a.values)})},setPointValues:function(){var a=this.xAxis,c=this.yAxis;f(this.points,function(d){var b=d.node,e=b.pointValues,k,f;e&&b.visible?(b=Math.round(a.translate(e.x,0,0,0,1))-0,k=Math.round(a.translate(e.x+e.width,0,0,0,1))-0,f=Math.round(c.translate(e.y,0,0,0,1))-0,e=Math.round(c.translate(e.y+e.height,0,0,0,1))-0,d.shapeType="rect",d.shapeArgs={x:Math.min(b,k),y:Math.min(f,e),width:Math.abs(k-b),height:Math.abs(e-f)},d.plotX=d.shapeArgs.x+d.shapeArgs.width/2,d.plotY=d.shapeArgs.y+d.shapeArgs.height/
2):(delete d.plotX,delete d.plotY)})},setColorRecursive:function(a,c,d,b,e){var k=this,t=k&&k.chart,t=t&&t.options&&t.options.colors,h;if(a){h=B(a,{colors:t,index:b,mapOptionsToLevel:k.mapOptionsToLevel,parentColor:c,parentColorIndex:d,series:k,siblings:e});if(c=k.points[a.i])c.color=h.color,c.colorIndex=h.colorIndex;f(a.children||[],function(c,d){k.setColorRecursive(c,h.color,h.colorIndex,d,a.children.length)})}},algorithmGroup:function(a,c,d,b){this.height=a;this.width=c;this.plot=b;this.startDirection=
this.direction=d;this.lH=this.nH=this.lW=this.nW=this.total=0;this.elArr=[];this.lP={total:0,lH:0,nH:0,lW:0,nW:0,nR:0,lR:0,aspectRatio:function(a,c){return Math.max(a/c,c/a)}};this.addElement=function(a){this.lP.total=this.elArr[this.elArr.length-1];this.total+=a;0===this.direction?(this.lW=this.nW,this.lP.lH=this.lP.total/this.lW,this.lP.lR=this.lP.aspectRatio(this.lW,this.lP.lH),this.nW=this.total/this.height,this.lP.nH=this.lP.total/this.nW,this.lP.nR=this.lP.aspectRatio(this.nW,this.lP.nH)):(this.lH=
this.nH,this.lP.lW=this.lP.total/this.lH,this.lP.lR=this.lP.aspectRatio(this.lP.lW,this.lH),this.nH=this.total/this.width,this.lP.nW=this.lP.total/this.nH,this.lP.nR=this.lP.aspectRatio(this.lP.nW,this.nH));this.elArr.push(a)};this.reset=function(){this.lW=this.nW=0;this.elArr=[];this.total=0}},algorithmCalcPoints:function(a,c,d,b){var e,k,t,h,g=d.lW,m=d.lH,u=d.plot,l,q=0,r=d.elArr.length-1;c?(g=d.nW,m=d.nH):l=d.elArr[d.elArr.length-1];f(d.elArr,function(a){if(c||q<r)0===d.direction?(e=u.x,k=u.y,
t=g,h=a/t):(e=u.x,k=u.y,h=m,t=a/h),b.push({x:e,y:k,width:t,height:h}),0===d.direction?u.y+=h:u.x+=t;q+=1});d.reset();0===d.direction?d.width-=g:d.height-=m;u.y=u.parent.y+(u.parent.height-d.height);u.x=u.parent.x+(u.parent.width-d.width);a&&(d.direction=1-d.direction);c||d.addElement(l)},algorithmLowAspectRatio:function(a,c,d){var b=[],e=this,k,g={x:c.x,y:c.y,parent:c},h=0,m=d.length-1,l=new this.algorithmGroup(c.height,c.width,c.direction,g);f(d,function(d){k=d.val/c.val*c.height*c.width;l.addElement(k);
l.lP.nR>l.lP.lR&&e.algorithmCalcPoints(a,!1,l,b,g);h===m&&e.algorithmCalcPoints(a,!0,l,b,g);h+=1});return b},algorithmFill:function(a,c,d){var b=[],e,k=c.direction,g=c.x,h=c.y,l=c.width,m=c.height,q,r,n,p;f(d,function(d){e=d.val/c.val*c.height*c.width;q=g;r=h;0===k?(p=m,n=e/p,l-=n,g+=n):(n=l,p=e/n,m-=p,h+=p);b.push({x:q,y:r,width:n,height:p});a&&(k=1-k)});return b},strip:function(a,c){return this.algorithmLowAspectRatio(!1,a,c)},squarified:function(a,c){return this.algorithmLowAspectRatio(!0,a,c)},
sliceAndDice:function(a,c){return this.algorithmFill(!0,a,c)},stripes:function(a,c){return this.algorithmFill(!1,a,c)},translate:function(){var a=this,c=a.options,d=a.rootNode=g(a.rootNode,a.options.rootId,""),b,e;n.prototype.translate.call(a);e=a.tree=a.getTree();b=a.nodeMap[d];a.mapOptionsToLevel=E({from:b.level+1,levels:c.levels,to:e.height,defaults:{levelIsConstant:a.options.levelIsConstant,colorByPoint:c.colorByPoint}});""===d||b&&b.children.length||(a.drillToNode("",!1),d=a.rootNode,b=a.nodeMap[d]);
D(a.nodeMap[a.rootNode],function(c){var d=!1,b=c.parent;c.visible=!0;if(b||""===b)d=a.nodeMap[b];return d});D(a.nodeMap[a.rootNode].children,function(a){var c=!1;f(a,function(a){a.visible=!0;a.children.length&&(c=(c||[]).concat(a.children))});return c});a.setTreeValues(e);a.axisRatio=a.xAxis.len/a.yAxis.len;a.nodeMap[""].pointValues=d={x:0,y:0,width:100,height:100};a.nodeMap[""].values=d=q(d,{width:d.width*a.axisRatio,direction:"vertical"===c.layoutStartingDirection?0:1,val:e.val});a.calculateChildrenAreas(e,
d);a.colorAxis?a.translateColors():c.colorByPoint||a.setColorRecursive(a.tree);c.allowDrillToNode&&(c=b.pointValues,a.xAxis.setExtremes(c.x,c.x+c.width,!1),a.yAxis.setExtremes(c.y,c.y+c.height,!1),a.xAxis.setScale(),a.yAxis.setScale());a.setPointValues()},drawDataLabels:function(){var a=this,c=a.mapOptionsToLevel,b=r(a.points,function(a){return a.node.visible}),g,e;f(b,function(b){e=c[b.node.level];g={style:{}};b.node.isLeaf||(g.enabled=!1);e&&e.dataLabels&&(g=q(g,e.dataLabels),a._hasPointLabels=
!0);b.shapeArgs&&(g.style.width=b.shapeArgs.width,b.dataLabel&&b.dataLabel.css({width:b.shapeArgs.width+"px"}));b.dlOptions=q(g,b.options.dataLabels)});n.prototype.drawDataLabels.call(this)},alignDataLabel:function(a){l.column.prototype.alignDataLabel.apply(this,arguments);a.dataLabel&&a.dataLabel.attr({zIndex:(a.node.zIndex||0)+1})},drawPoints:function(){var a=this,b=r(a.points,function(a){return a.node.visible});f(b,function(b){var c="level-group-"+b.node.levelDynamic;a[c]||(a[c]=a.chart.renderer.g(c).attr({zIndex:1E3-
b.node.levelDynamic}).add(a.group));b.group=a[c]});l.column.prototype.drawPoints.call(this);this.colorAttribs&&f(this.points,function(a){a.graphic&&a.graphic.css(this.colorAttribs(a))},this);a.options.allowDrillToNode&&f(b,function(b){b.graphic&&(b.drillId=a.options.interactByLeaf?a.drillToByLeaf(b):a.drillToByGroup(b))})},onClickDrillToNode:function(a){var b=(a=a.point)&&a.drillId;z(b)&&(a.setState(""),this.drillToNode(b))},drillToByGroup:function(a){var b=!1;1!==a.node.level-this.nodeMap[this.rootNode].level||
a.node.isLeaf||(b=a.id);return b},drillToByLeaf:function(a){var b=!1;if(a.node.parent!==this.rootNode&&a.node.isLeaf)for(a=a.node;!b;)a=this.nodeMap[a.parent],a.parent===this.rootNode&&(b=a.id);return b},drillUp:function(){var a=this.nodeMap[this.rootNode];a&&z(a.parent)&&this.drillToNode(a.parent)},drillToNode:function(a,b){var c=this.nodeMap[a];this.idPreviousRoot=this.rootNode;this.rootNode=a;""===a?this.drillUpButton=this.drillUpButton.destroy():this.showDrillUpButton(c&&c.name||a);this.isDirty=
!0;g(b,!0)&&this.chart.redraw()},showDrillUpButton:function(a){var b=this;a=a||"\x3c Back";var d=b.options.drillUpButton,f,e;d.text&&(a=d.text);this.drillUpButton?(this.drillUpButton.placed=!1,this.drillUpButton.attr({text:a}).align()):(e=(f=d.theme)&&f.states,this.drillUpButton=this.chart.renderer.button(a,null,null,function(){b.drillUp()},f,e&&e.hover,e&&e.select).addClass("highcharts-drillup-button").attr({align:d.position.align,zIndex:7}).add().align(d.position,!1,d.relativeTo||"plotBox"))},buildKDTree:y,
drawLegendSymbol:b.LegendSymbolMixin.drawRectangle,getExtremes:function(){n.prototype.getExtremes.call(this,this.colorValueData);this.valueMin=this.dataMin;this.valueMax=this.dataMax;n.prototype.getExtremes.call(this)},getExtremesFromAll:!0,bindAxes:function(){var a={endOnTick:!1,gridLineWidth:0,lineWidth:0,min:0,dataMin:0,minPadding:0,max:100,dataMax:100,maxPadding:0,startOnTick:!1,title:null,tickPositions:[]};n.prototype.bindAxes.call(this);b.extend(this.yAxis.options,a);b.extend(this.xAxis.options,
a)},utils:{recursive:D,reduce:I}},{getClassName:function(){var a=b.Point.prototype.getClassName.call(this),c=this.series,d=c.options;this.node.level<=c.nodeMap[c.rootNode].level?a+=" highcharts-above-level":this.node.isLeaf||g(d.interactByLeaf,!d.allowDrillToNode)?this.node.isLeaf||(a+=" highcharts-internal-node"):a+=" highcharts-internal-node-interactive";return a},isValid:function(){return this.id||m(this.value)},setState:function(a){b.Point.prototype.setState.call(this,a);this.graphic&&this.graphic.attr({zIndex:"hover"===
a?1:0})},setVisible:l.pie.prototype.pointClass.prototype.setVisible})})(p,F)});
