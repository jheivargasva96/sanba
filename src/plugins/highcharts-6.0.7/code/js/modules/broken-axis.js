/*
 Highcharts JS v6.0.7 (2018-02-16)

 (c) 2009-2017 Torstein Honsi

 License: www.highcharts.com/license
*/
(function(h){"object"===typeof module&&module.exports?module.exports=h:h(Highcharts)})(function(h){(function(f){function h(){return Array.prototype.slice.call(arguments,1)}function u(b){b.apply(this);this.drawBreaks(this.xAxis,["x"]);this.drawBreaks(this.yAxis,r(this.pointArrayMap,["y"]))}var r=f.pick,g=f.wrap,q=f.each,y=f.extend,z=f.isArray,v=f.fireEvent,t=f.Axis,A=f.Series;y(t.prototype,{isInBreak:function(b,c){var e=b.repeat||Infinity,a=b.from,d=b.to-b.from;c=c>=a?(c-a)%e:e-(a-c)%e;return b.inclusive?
c<=d:c<d&&0!==c},isInAnyBreak:function(b,c){var e=this.options.breaks,a=e&&e.length,d,n,w;if(a){for(;a--;)this.isInBreak(e[a],b)&&(d=!0,n||(n=r(e[a].showPoints,this.isXAxis?!1:!0)));w=d&&c?d&&!n:d}return w}});g(t.prototype,"setTickPositions",function(b){b.apply(this,Array.prototype.slice.call(arguments,1));if(this.options.breaks){var c=this.tickPositions,e=this.tickPositions.info,a=[],d;for(d=0;d<c.length;d++)this.isInAnyBreak(c[d])||a.push(c[d]);this.tickPositions=a;this.tickPositions.info=e}});
g(t.prototype,"init",function(b,c,e){var a=this;e.breaks&&e.breaks.length&&(e.ordinal=!1);b.call(this,c,e);b=this.options.breaks;a.isBroken=z(b)&&!!b.length;a.isBroken&&(a.val2lin=function(d){var n=d,b,c;for(c=0;c<a.breakArray.length;c++)if(b=a.breakArray[c],b.to<=d)n-=b.len;else if(b.from>=d)break;else if(a.isInBreak(b,d)){n-=d-b.from;break}return n},a.lin2val=function(d){var b,c;for(c=0;c<a.breakArray.length&&!(b=a.breakArray[c],b.from>=d);c++)b.to<d?d+=b.len:a.isInBreak(b,d)&&(d+=b.len);return d},
a.setExtremes=function(a,b,c,e,f){for(;this.isInAnyBreak(a);)a-=this.closestPointRange;for(;this.isInAnyBreak(b);)b-=this.closestPointRange;t.prototype.setExtremes.call(this,a,b,c,e,f)},a.setAxisTranslation=function(b){t.prototype.setAxisTranslation.call(this,b);b=a.options.breaks;var c=[],d=[],e=0,f,l,m=a.userMin||a.min,p=a.userMax||a.max,h=r(a.pointRangePadding,0),k,g;q(b,function(b){l=b.repeat||Infinity;a.isInBreak(b,m)&&(m+=b.to%l-m%l);a.isInBreak(b,p)&&(p-=p%l-b.from%l)});q(b,function(a){k=a.from;
for(l=a.repeat||Infinity;k-l>m;)k-=l;for(;k<m;)k+=l;for(g=k;g<p;g+=l)c.push({value:g,move:"in"}),c.push({value:g+(a.to-a.from),move:"out",size:a.breakSize})});c.sort(function(a,b){return a.value===b.value?("in"===a.move?0:1)-("in"===b.move?0:1):a.value-b.value});f=0;k=m;q(c,function(a){f+="in"===a.move?1:-1;1===f&&"in"===a.move&&(k=a.value);0===f&&(d.push({from:k,to:a.value,len:a.value-k-(a.size||0)}),e+=a.value-k-(a.size||0))});a.breakArray=d;a.unitLength=p-m-e+h;v(a,"afterBreaks");a.options.staticScale?
a.transA=a.options.staticScale:a.unitLength&&(a.transA*=(p-a.min+h)/a.unitLength);h&&(a.minPixelPadding=a.transA*a.minPointOffset);a.min=m;a.max=p})});g(A.prototype,"generatePoints",function(b){b.apply(this,h(arguments));var c=this.xAxis,e=this.yAxis,a=this.points,d,f=a.length,g=this.options.connectNulls,x;if(c&&e&&(c.options.breaks||e.options.breaks))for(;f--;)d=a[f],x=null===d.y&&!1===g,x||!c.isInAnyBreak(d.x,!0)&&!e.isInAnyBreak(d.y,!0)||(a.splice(f,1),this.data[f]&&this.data[f].destroyElements())});
f.Series.prototype.drawBreaks=function(b,c){var e=this,a=e.points,d,f,g,h;b&&q(c,function(c){d=b.breakArray||[];f=b.isXAxis?b.min:r(e.options.threshold,b.min);q(a,function(a){h=r(a["stack"+c.toUpperCase()],a[c]);q(d,function(c){g=!1;if(f<c.from&&h>c.to||f>c.from&&h<c.from)g="pointBreak";else if(f<c.from&&h>c.from&&h<c.to||f>c.from&&h>c.to&&h<c.from)g="pointInBreak";g&&v(b,g,{point:a,brk:c})})})})};f.Series.prototype.gappedPath=function(){var b=this.currentDataGrouping,c=b&&b.totalRange,b=this.options.gapSize,
e=this.points.slice(),a=e.length-1,d=this.yAxis;if(b&&0<a)for("value"!==this.options.gapUnit&&(b*=this.closestPointRange),c&&c>b&&(b=c);a--;)e[a+1].x-e[a].x>b&&(c=(e[a].x+e[a+1].x)/2,e.splice(a+1,0,{isNull:!0,x:c}),this.options.stacking&&(c=d.stacks[this.stackKey][c]=new f.StackItem(d,d.options.stackLabels,!1,c,this.stack),c.total=0));return this.getGraphPath(e)};g(f.seriesTypes.column.prototype,"drawPoints",u);g(f.Series.prototype,"drawPoints",u)})(h)});
