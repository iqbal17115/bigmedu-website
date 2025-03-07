<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <div class="container" style="margin: 20px;">
        <b>Paper Title:</b> {{@$journalPaper->paper_title}}<br>
        <b>Authors:</b> {{@$journalPaper->authors}}<br>
        <b>Email:</b> {{@$journalPaper->email}}<br>
        <b>Abstract:</b> {!!@$journalPaper->abstract!!}<br>
        <b>Research Paper Area:</b> {{@$journalPaper->research_area}}<br>
        <b>Country:</b> {{@$journalPaper->country}}<br>
        @if(@$journalPaper->attachment1)
        <b>Attachment 1:</b> <a href="{{asset('public/upload/bigm_journal_policy/'.@$journalPaper->attachment1)}}" download="">Download</a><br>
        @endif
        @if(@$journalPaper->attachment2)
        <b>Attachment 1:</b> <a href="{{asset('public/upload/bigm_journal_policy/'.@$journalPaper->attachment2)}}" download="">Download</a><br>
        @endif
        <b>Mobile:</b> {{@$journalPaper->mobile}}<br>
    </div>
</body>
</html>
