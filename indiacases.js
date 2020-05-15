const puppeteer1 =require('puppeteer');
async function getBunnies1(){
    const browser1 =await puppeteer1.launch({
        headless : true,
        defaultViewport:null
    });

    const page1 =await browser1.newPage();
    const url1='https://www.worldometers.https://www.pharmaceutical-technology.com/news/india-covid-19-coronavirus-updates-status-by-state//coronavirus/';
    await page1.goto(url1);
    
    page1.waitForSelector('.medium css-yrgpw8 svelte-nim44h striped compact desktop-only')
    .then(async function(){
        try{
        //const totalcases = await page.$$eval('.maincounter-number span',elements => { return elements.map(element =>element.innerHTML)});
        // const stories = await page.$$eval('a.storylink', anchors => { return anchors.map(anchor => anchor.textContent).slice(0, 10) })

        //console.log(totalcases[0]);
        //console.log(totalcases[1]);
        //console.log(totalcases[2]);

        const selector1 = '.medium css-yrgpw8 svelte-nim44h striped compact desktop-only > tbody > tr';
             //'#main_table_countries_today > tbody > tr';

        const row1 = await page1.$$eval(selector1, trs1 => trs1.map(tr1 => {
        const tds1 = [...tr1.getElementsByTagName('td')];
        return tds1.map(td1 => td1.textContent);
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
getBunnies1();