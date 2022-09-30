$(function()
{
    $('input[name^="involved"]').click(function()
    {
        var involved = $(this).is(':checked') ? 1 : 0;
        $.cookie('involved', involved, {expires: config.cookieLife, path: config.webRoot});
        window.location.reload();
    });

    $('[id="switchButton"]').click(function()
    {
        var projectType = $(this).attr('data-type');
        $.cookie('projectType', projectType, {expires: config.cookieLife, path: config.webRoot});
        window.location.reload();
    });

    $('input[name^="showEdit"]').click(function()
    {
        $.cookie('showProjectBatchEdit', $(this).is(':checked') ? 1 : 0, {expires: config.cookieLife, path: config.webRoot});
        setCheckbox();
    });
    setCheckbox();

    if(!useDatatable) resetNameWidth();

    $(":checkbox[name^='projectIdList']").on('click', function()
    {
        updateStatistic()
    });

    $(".check-all").on('click', function()
    {
        if($(":checkbox[name^='projectIdList']:not(:checked)").length == 0)
        {
            $(":checkbox[name^='projectIdList']").prop('checked', false);
        }
        else
        {
            $(":checkbox[name^='projectIdList']").prop('checked', true);
        }
        updateStatistic()
    });
});

/**
 * Set batch edit checkbox.
 *
 * @access public
 * @return void
 */
function setCheckbox()
{
    $('#projectForm .checkbox-primary').hide();
    if($.cookie('showProjectBatchEdit') == 1)
    {
        $('#projectForm .checkbox-primary').show();
    }
    else
    {
        $(":checkbox[name^='projectIdList']").prop('checked', false);
        $('.table-actions').hide();
        $('.check-all').removeClass('checked');
    }
}

function resetNameWidth()
{
    $name = $('#projectForm thead th.c-name');
    if($name.width() < 350) $name.width(350);
}

$('#mainContent .sidebar-toggle').click(function()
{
    if(!useDatatable) setTimeout("resetNameWidth()", 100);
})

/**
 * Change program.
 *
 * @param  int    $programID
 * @access public
 * @return void
 */
function changeProgram(programID)
{
    link = createLink('project', 'browse', 'programID=' + programID + '&browseType=' + browseType + '&param=' + param + '&orderBy=order_asc&recTotal=' + recTotal + '&recPerPage=' + recPerPage + '&pageID=' + pageID);
    location.href = link;
}

$(".tree #program" + programID).parent('li').addClass('active');

/**
 * Add a statistics prompt statement after the Edit button.
 *
 * @access public
 * @return void
 */
function addStatistic()
{
    var checkedLength = $(":checkbox[name^='projectIdList']:checked").length;
    if(checkedLength > 0)
    {
        $('.table-actions').show();
    }
    else
    {
        $('.table-actions').hide();
    }
}

/**
 * Anti shake operation for jquery.
 *
 * @param  fn $fn
 * @param  delay $delay
 * @access public
 * @return void
 */
function debounce(fn, delay)
{
    var timer = null;
    return function()
    {
        if(timer) clearTimeout(timer);
        timer = setTimeout(fn, delay)
    }
}

/**
 * Update statistics.
 *
 * @access public
 * @return void
 */
function updateStatistic()
{
    debounce(addStatistic(), 200)
}
