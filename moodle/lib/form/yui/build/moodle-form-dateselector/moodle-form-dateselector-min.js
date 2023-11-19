YUI.add("moodle-form-dateselector",function(n,e){var t,o;n.mix(n.Node.prototype,{firstOptionValue:function(){return"select"===this.get("nodeName").toLowerCase()&&this.one("option").get("value")},lastOptionValue:function(){return"select"===this.get("nodeName").toLowerCase()&&this.all("option").item(this.optionSize()-1).get("value")},optionSize:function(){return"select"===this.get("nodeName").toLowerCase()&&parseInt(this.all("option").size(),10)},selectedOptionValue:function(){return"select"===this.get("nodeName").toLowerCase()&&this.all("option").item(this.get("selectedIndex")).get("value")}}),M.form=M.form||{},M.form.dateselector={panel:null,calendar:null,currentowner:null,hidetimeout:null,repositiontimeout:null,init_date_selectors:function(e){null===this.panel&&this.initPanel(e),n.all(".fdate_time_selector").each(function(){e.node=this,new t(e)}),n.all(".fdate_selector").each(function(){e.node=this,new t(e)})},initPanel:function(e){this.panel=new n.Overlay({visible:!1,bodyContent:n.Node.create('<div id="dateselector-calendar-content"></div>'),id:"dateselector-calendar-panel",constrain:!0}),this.panel.render(document.body),this.panel.on("focus",function(){var e,t=0;n.all(" [role=dialog], [role=menubar], .moodle-has-zindex").each(function(e){e=this.findZIndex(e);t<e&&(t=e)},this),e=(t+1).toString(),n.one("#dateselector-calendar-panel").setStyle("zIndex",e)},this),this.panel.on("heightChange",this.fix_position,this),n.one("#dateselector-calendar-panel").on("click",function(e){e.halt()}),n.one(document.body).on("click",this.document_click,this),this.calendar=new o({contentBox:"#dateselector-calendar-content",width:"300px",showPrevMonth:!0,showNextMonth:!0,firstdayofweek:parseInt(e.firstdayofweek,10),WEEKDAYS_MEDIUM:[e.sun,e.mon,e.tue,e.wed,e.thu,e.fri,e.sat]})},findZIndex:function(e){e=e.getStyle("zIndex")||e.ancestor().getStyle("zIndex");return e?parseInt(e,10):0},cancel_any_timeout:function(){this.hidetimeout&&(clearTimeout(this.hidetimeout),this.hidetimeout=null),this.repositiontimeout&&(clearTimeout(this.repositiontimeout),this.repositiontimeout=null)},delayed_reposition:function(){this.repositiontimeout&&(clearTimeout(this.repositiontimeout),this.repositiontimeout=null),this.repositiontimeout=setTimeout(this.fix_position,500)},fix_position:function(){var e;this.currentowner&&(e=[n.WidgetPositionAlign.BL,n.WidgetPositionAlign.TL],window.right_to_left()&&(e=[n.WidgetPositionAlign.BR,n.WidgetPositionAlign.TR]),this.panel.set("align",{node:this.currentowner.get("node").one("select"),points:e}))},document_click:function(e){this.currentowner&&(this.currentowner.get("node").ancestor("div").contains(e.target)?setTimeout(function(){M.form.dateselector.cancel_any_timeout()},100):this.currentowner.release_calendar(e))}},o=function(){o.superclass.constructor.apply(this,arguments)},n.extend(o,n.Calendar,{initializer:function(e){this.set("strings.very_short_weekdays",e.WEEKDAYS_MEDIUM),this.set("strings.first_weekday",e.firstdayofweek)}},{NAME:"Calendar",ATTRS:{}}),M.form_moodlecalendar=M.form_moodlecalendar||{},M.form_moodlecalendar.initializer=function(e){return new o(e)},(t=function(){t.superclass.constructor.apply(this,arguments)}).prototype={panel:null,yearselect:null,monthselect:null,dayselect:null,calendarimage:null,enablecheckbox:null,closepopup:!0,initializer:function(){var e=this.get("node").all("select");e.each(function(e){e.get("name").match(/\[year\]/)?this.yearselect=e:e.get("name").match(/\[month\]/)?this.monthselect=e:e.get("name").match(/\[day\]/)&&(this.dayselect=e),e.after("change",this.handle_select_change,this)},this),this.get("node").all("input, a").each(function(e){e.get("name").match(/\[calendar\]/)?(e.on("click",this.focus_event,this),this.calendarimage=e):(e.on("click",this.toggle_calendar_image,this),this.enablecheckbox=e),this.calendarimage&&this.enablecheckbox&&this.toggle_calendar_image()},this)},focus_event:function(e){M.form.dateselector.cancel_any_timeout(),M.form.dateselector.currentowner===this?this.release_calendar():null!==this.enablecheckbox&&!this.enablecheckbox.get("checked")||this.claim_calendar(),e.preventDefault()},handle_select_change:function(){this.closepopup=!1,this.set_date_from_selects(),this.closepopup=!0},claim_calendar:function(){M.form.dateselector.cancel_any_timeout(),M.form.dateselector.currentowner!==this&&(M.form.dateselector.currentowner&&M.form.dateselector.currentowner.release_calendar(),M.form.dateselector.currentowner!==this&&(this.connect_handlers(),this.set_date_from_selects()),M.form.dateselector.currentowner=this,M.form.dateselector.calendar.set("minimumDate",new Date(this.yearselect.firstOptionValue(),0,1)),M.form.dateselector.calendar.set("maximumDate",new Date(this.yearselect.lastOptionValue(),11,31)),M.form.dateselector.panel.show(),M.form.dateselector.calendar.show(),M.form.dateselector.fix_position(),setTimeout(function(){M.form.dateselector.cancel_any_timeout()},100),M.form.dateselector.calendar.focus(),n.one(document.body).on("keyup",function(e){(M.form.dateselector.currentowner===this&&!M.form.dateselector.calendar.get("focused")||27===e.keyCode&&M.form.dateselector.calendar.get("focused"))&&(this.calendarimage.focus(),this.release_calendar())},this))},set_date_from_selects:function(){var e=parseInt(this.yearselect.get("value"),10),t=parseInt(this.monthselect.get("value"),10)-1,n=parseInt(this.dayselect.get("value"),10),e=new Date(e,t,n);M.form.dateselector.calendar.deselectDates(),M.form.dateselector.calendar.selectDates([e]),M.form.dateselector.calendar.set("date",e),M.form.dateselector.calendar.render(),e.getDate()!==n&&(this.dayselect.set("value",e.getDate()),this.monthselect.set("value",e.getMonth()+1))},set_selects_from_date:function(e){var e=e.newSelection[0],t=n.DataType.Date.format(e,{format:"%Y"}),t=t-this.yearselect.firstOptionValue();this.yearselect.set("selectedIndex",t),this.monthselect.set("selectedIndex",n.DataType.Date.format(e,{format:"%m"})-this.monthselect.firstOptionValue()),this.dayselect.set(
"selectedIndex",n.DataType.Date.format(e,{format:"%d"})-this.dayselect.firstOptionValue()),M.form.dateselector.currentowner&&this.closepopup&&this.release_calendar()},connect_handlers:function(){M.form.dateselector.calendar.on("selectionChange",this.set_selects_from_date,this,!0)},release_calendar:function(e){var t=M.form.dateselector.currentowner===this;M.form.dateselector.panel.hide(),M.form.dateselector.calendar.detach("selectionChange",this.set_selects_from_date),M.form.dateselector.calendar.hide(),M.form.dateselector.currentowner=null,!t||null!=e&&"click"===e.type||this.calendarimage.focus()},toggle_calendar_image:function(){this.enablecheckbox.get("checked")?(this.calendarimage.removeClass("disabled"),this.calendarimage.setAttribute("tabindex",0)):(this.calendarimage.addClass("disabled"),this.calendarimage.setAttribute("tabindex",-1),this.release_calendar())}},n.extend(t,n.Base,t.prototype,{NAME:"Date Selector",ATTRS:{firstdayofweek:{validator:n.Lang.isString},node:{setter:function(e){return n.one(e)}}}})},"@VERSION@",{requires:["base","node","overlay","calendar"]});