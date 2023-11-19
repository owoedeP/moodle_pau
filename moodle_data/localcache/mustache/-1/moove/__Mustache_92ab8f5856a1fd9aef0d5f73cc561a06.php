<?php

class __Mustache_92ab8f5856a1fd9aef0d5f73cc561a06 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('theme_moove/head')) {
            $buffer .= $partial->renderInternal($context, $indent . '    ');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<head>
';
        $buffer .= $indent . '    <style>
';
        $buffer .= $indent . '        .beginers-course-info1 {
';
        $buffer .= $indent . '            cursor: pointer;
';
        $buffer .= $indent . '            transition: width .35s ease-in-out;
';
        $buffer .= $indent . '            }
';
        $buffer .= $indent . '        .beginers-course-info1:hover{
';
        $buffer .= $indent . '            opacity: 0.7;
';
        $buffer .= $indent . '        }
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '       .beginers-course-info2 {
';
        $buffer .= $indent . '            cursor: pointer;
';
        $buffer .= $indent . '            transition: width .35s ease-in-out;
';
        $buffer .= $indent . '            }
';
        $buffer .= $indent . '        .beginers-course-info2:hover{
';
        $buffer .= $indent . '            opacity: 0.7;
';
        $buffer .= $indent . '            background-color:#003366;
';
        $buffer .= $indent . '            color:white;
';
        $buffer .= $indent . '        }
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        .beginers-course-info3 {
';
        $buffer .= $indent . '            cursor: pointer;
';
        $buffer .= $indent . '            
';
        $buffer .= $indent . '            }
';
        $buffer .= $indent . '        .beginers-course-info3:hover{
';
        $buffer .= $indent . '            opacity: 0.7;
';
        $buffer .= $indent . '        }
';
        $buffer .= $indent . '    </style>
';
        $buffer .= $indent . '</head>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<body ';
        $value = $this->resolveValue($context->find('bodyattributes'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '>
';
        $buffer .= $indent . '<div id="page-wrapper" class="d-print-block">
';
        if ($partial = $this->mustache->loadPartial('theme_moove/navbar')) {
            $buffer .= $partial->renderInternal($context, $indent . '    ');
        }
        $buffer .= $indent . '    <div id="page" data-region="mainpage" data-usertour="scroller" class="drawers drag-container bg-white">
';
        $buffer .= $indent . '        <div id="topofscroll">
';
        $buffer .= $indent . '            <div id="page-content" class="d-print-block main-inner">
';
        $buffer .= $indent . '                <div id="region-main-box">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                        <div style = \'margin-bottom: 35px;\'>
';
        $buffer .= $indent . '                        <h2> English Literacy Course </h2>
';
        $buffer .= $indent . '                        <p style =\'line-height: 30px; margin-top: 20px;\'>The English Literacy Course is meticulously crafted to accommodate learners
';
        $buffer .= $indent . '                        at various proficiency levels. Before embarking on your language journey, a
';
        $buffer .= $indent . '                        benchmark test will be required to assess your language proficiency and place
';
        $buffer .= $indent . '                        you on the appropriate track on the course outline. The course offerings
';
        $buffer .= $indent . '                        include the Basic English Literacy Course, which provides a solid foundation
';
        $buffer .= $indent . '                        in reading, writing, speaking, and listening; the Intermediate English
';
        $buffer .= $indent . '                        Literacy Course, focusing on vocabulary expansion and confident communication;
';
        $buffer .= $indent . '                        and the Advanced English Literacy Course, refining advanced language skills
';
        $buffer .= $indent . '                        for professional and academic success.</p> </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                       <a href =\'http://127.0.0.1/moodle4.1/moodle/login/index.php\'> <div class="course-blocks" style = \' display:flex;
';
        $buffer .= $indent . '                        flex-direction: row;
';
        $buffer .= $indent . '                        justify-content: space-between;
';
        $buffer .= $indent . '                        font-size: 13px;\'> 
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                        <div class="beginers-course-info1" style = \'line-height: 30px;
';
        $buffer .= $indent . '                        display:flex;
';
        $buffer .= $indent . '                        flex-direction: column;
';
        $buffer .= $indent . '                        flex: 1;
';
        $buffer .= $indent . '                        padding-top: 100px; 
';
        $buffer .= $indent . '                        padding-bottom: 100px;
';
        $buffer .= $indent . '                        padding-right:30px;
';
        $buffer .= $indent . '                        padding-left:30px; 
';
        $buffer .= $indent . '                        color:white;
';
        $buffer .= $indent . '                        text-align: center;
';
        $buffer .= $indent . '                        border: 1px;
';
        $buffer .= $indent . '                        border-color: white;
';
        $buffer .= $indent . '                        margin-top: 50px;
';
        $buffer .= $indent . '                        margin-bottom: 40px;
';
        $buffer .= $indent . '                        line-height: 25px;
';
        $buffer .= $indent . '                        background-color: #003366;\'>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                        <div class="beginers-head" style = \'font-size: 40px; font-weight: bold; margin-bottom: 40px;\'>Beginners</div>
';
        $buffer .= $indent . '                        <div class= "beginersheader" style = \'font-weight: bold;font-size: 17px;margin-bottom: 10px;\'>Starting your language journey!</div>
';
        $buffer .= $indent . '                        <div class= "beginersinfo">Building essential skills for effective communication!</div>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    
';
        $buffer .= $indent . '                        <div class="beginers-course-info2" style = \'line-height: 30px;
';
        $buffer .= $indent . '                        display:flex;
';
        $buffer .= $indent . '                        flex-direction: column;
';
        $buffer .= $indent . '                        flex:1;
';
        $buffer .= $indent . '                        padding-top: 100px; 
';
        $buffer .= $indent . '                        padding-bottom: 100px;
';
        $buffer .= $indent . '                        padding-right:30px;
';
        $buffer .= $indent . '                        padding-left:30px; 
';
        $buffer .= $indent . '                        color:#002a54;
';
        $buffer .= $indent . '                        text-align: center;
';
        $buffer .= $indent . '                        border: 1px;
';
        $buffer .= $indent . '                        border-color: white;
';
        $buffer .= $indent . '                        margin-top: 50px;
';
        $buffer .= $indent . '                        margin-bottom: 40px;
';
        $buffer .= $indent . '                        margin-left: 10px;
';
        $buffer .= $indent . '                        margin-right: 10px;
';
        $buffer .= $indent . '                        line-height: 25px;
';
        $buffer .= $indent . '                        background-color: #e2e7ea;
';
        $buffer .= $indent . '                        cusor: pointer\'>
';
        $buffer .= $indent . '                        <div class="beginers-head" style = \'font-size: 40px; font-weight: bold; margin-bottom: 40px;\'>Intermediate</div>
';
        $buffer .= $indent . '                        <div style = \'font-weight: bold;font-size: 17px;margin-bottom: 10px;\'>Taking the next step in your language mastery</div>
';
        $buffer .= $indent . '                        <div class= "beginersinfo">Elevating your vocabulary, grammar, and communication prowess!</div>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                        <div class="beginers-course-info3" style = \'line-height: 30px;
';
        $buffer .= $indent . '                        display:flex;
';
        $buffer .= $indent . '                        flex-direction: column;
';
        $buffer .= $indent . '                        flex: 1;
';
        $buffer .= $indent . '                        padding-top: 100px; 
';
        $buffer .= $indent . '                        padding-bottom: 100px;
';
        $buffer .= $indent . '                        padding-right:30px;
';
        $buffer .= $indent . '                        padding-left:30px; 
';
        $buffer .= $indent . '                        color:white;
';
        $buffer .= $indent . '                        text-align: center;
';
        $buffer .= $indent . '                        border: 1px;
';
        $buffer .= $indent . '                        border-color: white;
';
        $buffer .= $indent . '                        margin-top: 50px;
';
        $buffer .= $indent . '                        margin-bottom: 40px;
';
        $buffer .= $indent . '                        line-height: 25px;
';
        $buffer .= $indent . '                        background-color: #003366;\'>
';
        $buffer .= $indent . '                        <div class="beginers-head" style = \'font-size: 40px; font-weight: bold; margin-bottom: 40px;\'>Advanced</div>
';
        $buffer .= $indent . '                        <div class= "beginersheader" style = \'font-weight: bold;font-size: 17px;margin-bottom: 10px;\'>Advancing to excellence</div>
';
        $buffer .= $indent . '                        <div class= "beginersinfo">Refining complex language, grammar, and communication for professional and academic success!</div>
';
        $buffer .= $indent . '                        </div> 
';
        $buffer .= $indent . '                        </div> </a>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                       
';
        $buffer .= $indent . '                    </section>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '       
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    
';
        if ($partial = $this->mustache->loadPartial('theme_moove/footer')) {
            $buffer .= $partial->renderInternal($context, $indent . '    ');
        }
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</body>
';
        $buffer .= $indent . '</html>
';
        $buffer .= $indent . '
';
        $value = $context->find('js');
        $buffer .= $this->sectionD5eff8d9058099fcfedd1c4d37109af7($context, $indent, $value);
        $buffer .= $indent . '
';

        return $buffer;
    }

    private function sectionD5eff8d9058099fcfedd1c4d37109af7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    M.util.js_pending(\'theme_boost/loader\');
    require([\'theme_boost/loader\', \'theme_boost/drawer\'], function(Loader, Drawer) {
        Drawer.init();
        M.util.js_complete(\'theme_boost/loader\');
    });
    require([\'jquery\'], function($) {
        $(\'.carousel\').carousel({
            interval: 5000
        });
    });
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    M.util.js_pending(\'theme_boost/loader\');
';
                $buffer .= $indent . '    require([\'theme_boost/loader\', \'theme_boost/drawer\'], function(Loader, Drawer) {
';
                $buffer .= $indent . '        Drawer.init();
';
                $buffer .= $indent . '        M.util.js_complete(\'theme_boost/loader\');
';
                $buffer .= $indent . '    });
';
                $buffer .= $indent . '    require([\'jquery\'], function($) {
';
                $buffer .= $indent . '        $(\'.carousel\').carousel({
';
                $buffer .= $indent . '            interval: 5000
';
                $buffer .= $indent . '        });
';
                $buffer .= $indent . '    });
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
