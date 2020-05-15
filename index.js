const puppeteer =require('puppeteer');
async function getBunnies(){
    const browser =await puppeteer.launch({
        headless : true,
        defaultViewport:null
    });

    const page =await browser.newPage();
    const url='https://www.worldometers.info/coronavirus/';
    await page.goto(url);
    
    page.waitForSelector('.maincounter-number')
    .then(async function(){
        try{
        //const totalcases = await page.$$eval('.maincounter-number span',elements => { return elements.map(element =>element.innerHTML)});
        // const stories = await page.$$eval('a.storylink', anchors => { return anchors.map(anchor => anchor.textContent).slice(0, 10) })

        //console.log(totalcases[0]);
        //console.log(totalcases[1]);
        //console.log(totalcases[2]);

        const selector = '#main_table_countries_today > tbody > tr';

        const row = await page.$$eval(selector, trs => trs.map(tr => {
        const tds = [...tr.getElementsByTagName('td')];
        return tds.map(td => td.textContent);
        }));
        //console.log(row[9][3]);

        for(let i=0;i<70;i++){
            for(let j=0;j<11;j++){
                process.stdout.write(row[i][j]+"  ");
            }
            console.log('\n');
        }
    }
    catch(err){
        console.error('my error',err);
    }
    })
}
getBunnies();