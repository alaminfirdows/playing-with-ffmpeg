<?php

require 'vendor/autoload.php';

$ffmpeg = FFMpeg\FFMpeg::create();
$video = $ffmpeg->open('files/sample.mpg');

// Resize
$video->filters()
    ->resize(new FFMpeg\Coordinate\Dimension(320, 240))
    ->synchronize();

// Add frame
$video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))
    ->save('frame.jpg');

// Save
$video->save(new FFMpeg\Format\Video\X264(), 'outputs/export-x264.mp4')
    ->save(new FFMpeg\Format\Video\WMV(), 'outputs/export-wmv.wmv')
    ->save(new FFMpeg\Format\Video\WebM(), 'outputs/export-webm.webm');
