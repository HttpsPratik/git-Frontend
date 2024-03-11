    @php
        $url_explode = explode('.', $attachment->url['name']);
        $filename = end($url_explode);
    @endphp
    @switch(\Illuminate\Support\Facades\File::mimeType(public_path($attachment->url['path'].'/uploads/'.$attachment->url['name'])))
        @case('image/jpeg')
            <li>
                <span class="mailbox-attachment-icon has-img" style="height: 132.5px;">
                    <img src="{{ $SignedUrl->createSignedUrlThumbnail($attachment->url['path'], $attachment->url['name']) }}"
                        alt="Image jpg">
                </span>
                <div class="mailbox-attachment-info">
                    <a href="{{ $url }}" target="_blank" class="mailbox-attachment-name small">
                        <i class="fas fa-camera"></i> {{ $filename }}
                    </a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                        <span>{{ $fileSize }}</span>
                        <a href="{{ $url }}" class="btn btn-default btn-sm float-right"
                            download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                            <i class="fas fa-cloud-download-alt"></i>
                        </a>
                    </span>
                </div>
            </li>
        @break

        @case('image/webp')
            <li>
                <span class="mailbox-attachment-icon has-img" style="height: 132.5px;">
                    <img src="{{ $SignedUrl->createSignedUrlThumbnail($attachment->url['path'], $attachment->url['name']) }}"
                        alt="Image webp">
                </span>
                <div class="mailbox-attachment-info">
                    <a href="{{ $url }}" target="_blank" class="mailbox-attachment-name small">
                        <i class="fas fa-camera"></i> {{ $filename }}
                    </a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                        <span>{{ $fileSize }}</span>
                        <a href="{{ $url }}" class="btn btn-default btn-sm float-right"
                            download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                            <i class="fas fa-cloud-download-alt"></i>
                        </a>
                    </span>
                </div>
            </li>
        @break

        @case('application/vnd.openxmlformats-officedocument.presentationml.presentation')
            <li>
                <span class="mailbox-attachment-icon"><i class="fa-solid fa-file-powerpoint"></i></span>
                <div class="mailbox-attachment-info">
                    <a href="{{ $url }}" class="mailbox-attachment-name small"
                        download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                        <i class="fas fa-paperclip"></i> {{ $filename }}
                    </a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                        <span>{{ $fileSize }}</span>
                        <a href="{{ $url }}" class="btn btn-default btn-sm float-right"
                            download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                            <i class="fas fa-cloud-download-alt"></i>
                        </a>
                    </span>
                </div>
            </li>
        @break

        @case('application/pdf')
            <li>
                <span class="mailbox-attachment-icon"><i class="fa-solid fa-file-pdf"></i></span>
                <div class="mailbox-attachment-info">
                    <a href="{{ $url }}" target="_blank" class="mailbox-attachment-name small">
                        <i class="fas fa-paperclip"></i> {{ $filename }}
                    </a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                        <span>{{ $fileSize }}</span>
                        <a href="{{ $url }}" class="btn btn-default btn-sm float-right"
                            download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                            <i class="fas fa-cloud-download-alt"></i>
                        </a>
                    </span>
                </div>
            </li>
        @break

        @case('image/png')
            <li>
                <span class="mailbox-attachment-icon has-img" style="height: 132.5px;">
                    <img src="{{ $SignedUrl->createSignedUrlThumbnail($attachment->url['path'], $attachment->url['name']) }}"
                        alt="Image png">
                </span>
                <div class="mailbox-attachment-info">
                    <a href="{{ $url }}" target="_blank" class="mailbox-attachment-name small">
                        <i class="fas fa-camera"></i> {{ $filename }}
                    </a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                        <span>{{ $fileSize }}</span>
                        <a href="{{ $url }}" class="btn btn-default btn-sm float-right"
                            download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                            <i class="fas fa-cloud-download-alt"></i>
                        </a>
                    </span>
                </div>
            </li>
        @break

        @case('application/msword')
            <li>
                <span class="mailbox-attachment-icon">
                    <i class="fa-solid fa-file-word"></i>
                </span>
                <div class="mailbox-attachment-info">
                    <a href="{{ $url }}" class="mailbox-attachment-name small"
                        download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                        <i class="fas fa-paperclip"></i> {{ $filename }}
                    </a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                        <span>{{ $fileSize }}</span>
                        <a href="{{ $url }}" class="btn btn-default btn-sm float-right"
                            download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                            <i class="fas fa-cloud-download-alt"></i>
                        </a>
                    </span>
                </div>
            </li>
        @break

        @case('application/vnd.openxmlformats-officedocument.wordprocessingml.document')
            <li>
                <span class="mailbox-attachment-icon">
                    <i class="fa-solid fa-file-word"></i>
                </span>
                <div class="mailbox-attachment-info">
                    <a href="{{ $url }}" class="mailbox-attachment-name small"
                        download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                        <i class="fas fa-paperclip"></i> {{ $filename }}
                    </a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                        <span>{{ $fileSize }}</span>
                        <a href="{{ $url }}" class="btn btn-default btn-sm float-right"
                            download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                            <i class="fas fa-cloud-download-alt"></i>
                        </a>
                    </span>
                </div>
            </li>
        @break

        @case('image/x-ms-bmp')
            <li>
                <span class="mailbox-attachment-icon has-img" style="height: 132.5px;">
                    <img src="{{ $SignedUrl->createSignedUrlThumbnail($attachment->url['path'], $attachment->url['name']) }}"
                        alt="Image bmp">
                </span>
                <div class="mailbox-attachment-info">
                    <a href="{{ $url }}" target="_blank" class="mailbox-attachment-name small"
                        download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                        <i class="fas fa-camera"></i> {{ $filename }}
                    </a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                        <span>{{ $fileSize }}</span>
                        <a href="{{ $url }}" class="btn btn-default btn-sm float-right"
                            download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                            <i class="fas fa-cloud-download-alt"></i>
                        </a>
                    </span>
                </div>
            </li>
        @break

        @case('application/vnd.ms-powerpoint')
            <li>
                <span class="mailbox-attachment-icon"><i class="fa-solid fa-file-powerpoint"></i></span>
                <div class="mailbox-attachment-info">
                    <a href="{{ $url }}" class="mailbox-attachment-name small"
                        download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                        <i class="fas fa-paperclip"></i> {{ $filename }}
                    </a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                        <span>{{ $fileSize }}</span>
                        <a href="{{ $url }}" class="btn btn-default btn-sm float-right"
                            download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                            <i class="fas fa-cloud-download-alt"></i>
                        </a>
                    </span>
                </div>
            </li>
        @break

        @case('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            <li>
                <span class="mailbox-attachment-icon"><i class="fa-solid fa-file-excel"></i></span>
                <div class="mailbox-attachment-info">
                    <a href="{{ $url }}" class="mailbox-attachment-name small"
                        download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                        <i class="fas fa-paperclip"></i> {{ $filename }}
                    </a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                        <span>{{ $fileSize }}</span>
                        <a href="{{ $url }}" class="btn btn-default btn-sm float-right"
                            download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                            <i class="fas fa-cloud-download-alt"></i>
                        </a>
                    </span>
                </div>
            </li>
        @break

        @case('application/vnd.ms-excel')
            <li>
                <span class="mailbox-attachment-icon">
                    <i class="fa-solid fa-file-excel"></i>
                </span>
                <div class="mailbox-attachment-info">
                    <a href="{{ $url }}" class="mailbox-attachment-name small"
                        download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                        <i class="fas fa-paperclip"></i> {{ $filename }}
                    </a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                        <span>{{ $fileSize }}</span>
                        <a href="{{ $url }}" class="btn btn-default btn-sm float-right"
                            download="{{ 'file-' . now()->format('m-d') . '_' . rand(1, 1000) }}">
                            <i class="fas fa-cloud-download-alt"></i>
                        </a>
                    </span>
                </div>
            </li>
        @break

        @default
            <span>{{-- {{ \Illuminate\Support\Facades\File::mimeType(public_path($attachment->url['path'].'/uploads/'.$attachment->url['name']))
    .' & & '.\Illuminate\Support\Facades\File::extension(public_path($attachment->url['path'].'/uploads/'.$attachment->url['name'])) .' & & -- '}} --}}</span>
    @endswitch
