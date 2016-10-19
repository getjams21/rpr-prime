<div class="modal fade" id="preview-images" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="preview-images-modal">
      <div class="modal-header">
        <button type="button" class="close close-modal close-image-modal" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Item Images</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="col-md-12">
            <div class="well customerForm">
              <div id="links">
                
                  <!-- <a href="'. $storagePath.'/public/item-images/20/1.jpg' .'" title="Banana" data-gallery>
                      <img src="" alt="Banana">
                  </a> -->
              </div>
              <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
              <div id="blueimp-gallery" class="blueimp-gallery">
                  <!-- The container for the modal slides -->
                  <div class="slides"></div>
                  <!-- Controls for the borderless lightbox -->
                  <h3 class="title"></h3>
                  <a class="prev">‹</a>
                  <a class="next">›</a>
                  <a class="close">×</a>
                  <a class="play-pause"></a>
                  <ol class="indicator"></ol>
                  <!-- The modal dialog, which will be used to wrap the lightbox content -->
                  <div class="modal fade">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title"></h4>
                              </div>
                              <div class="modal-body next"></div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left prev">
                                      <i class="glyphicon glyphicon-chevron-left"></i>
                                      Previous
                                  </button>
                                  <button type="button" class="btn btn-primary next">
                                      Next
                                      <i class="glyphicon glyphicon-chevron-right"></i>
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        
      </div>     
    </div>
  </div>
</div>