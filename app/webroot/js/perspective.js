const utils = new Utils('errorMessage');
const applyButton = document.getElementById('apply');

const setUpApplyButton = function () { 
    //console.log(cv)
    
    // obtener coordenadas azules
    let pointsArray = []
    const children = document.querySelectorAll('#window_g .handle')
    console.log(children)
    children.forEach(e =>{
        const pos = e.getAttribute('transform');
        console.dir(pos)
        const point = pos.replace('translate(','').replace(')','').split(',')
        pointsArray.push(point[0])
        pointsArray.push(point[1])
    })
    console.log(pointsArray)
    //copiar #sample to canvas imageInit
    imageUsed = document.getElementById('sample').getAttribute('src');
    utils.loadImageToCanvas(imageUsed, 'imageInit')
    setTimeout(()=>{
	    let src = cv.imread('imageInit');
	     imageHeight = document.getElementById('imageInit').height
	     imageWidth = document.getElementById('imageInit').width
	    const svgCropHeight =  document.querySelector('#background svg').getAttribute('height') - 80
	    const svgCropWidth =  document.querySelector('#background svg').getAttribute('width') - 80
	    //console.log('h : ',svgCropHeight,' w : ',svgCropWidth)
	    const scaleFactor = parseInt(imageWidth / svgCropWidth)
	    pointsArray = pointsArray.map( e => {
		const num = parseInt((parseInt(e) + 40))
		return num
	    })

		pointsArray[0] = parseInt(pointsArray[0]*(imageWidth/document.getElementById('sample').width));
		pointsArray[2] = parseInt(pointsArray[2]*(imageWidth/document.getElementById('sample').width));
		pointsArray[4] = parseInt(pointsArray[4]*(imageWidth/document.getElementById('sample').width));
		pointsArray[6] = parseInt(pointsArray[6]*(imageWidth/document.getElementById('sample').width));

		pointsArray[1] = parseInt(pointsArray[1]*(imageHeight/document.getElementById('sample').height));
		pointsArray[3] = parseInt(pointsArray[3]*(imageHeight/document.getElementById('sample').height));
		pointsArray[5] = parseInt(pointsArray[5]*(imageHeight/document.getElementById('sample').height));
		pointsArray[7] = parseInt(pointsArray[7]*(imageHeight/document.getElementById('sample').height));

	    let dst = new cv.Mat();
	    let dsize = new cv.Size(new_width,new_height); // truewidth,trueheight
	     imageHeight = document.getElementById('imageInit').height
	     imageWidth = document.getElementById('imageInit').width

	    let srcTri = cv.matFromArray(4, 1, cv.CV_32FC2, pointsArray);
  	    newdims = [0, 0, new_width, 0, new_width, new_height, 0, new_height];
	    let dstTri = cv.matFromArray(4, 1, cv.CV_32FC2, newdims );
	    let M = cv.getPerspectiveTransform(srcTri, dstTri);
	    cv.warpPerspective(src, dst, M, dsize, cv.INTER_LINEAR, cv.BORDER_CONSTANT, new cv.Scalar());

	    document.getElementById('imageInit').style.display = "none"
	    cv.imshow('imageResult', dst);
	    src.delete(); dst.delete(); M.delete(); srcTri.delete(); dstTri.delete();
		window.location.hash = '#imageResult';

		$("#ocrafter").show();
    },500)
    
        
}
applyButton.setAttribute('disabled','true');
applyButton.onclick = setUpApplyButton;

utils.loadOpenCv(() => {
    setTimeout(function () { 
        applyButton.removeAttribute('disabled');
    },500)
});
