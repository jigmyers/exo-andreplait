const articleList = []; // In a real app this list would be full of articles.
let kudos = 5;

function calculateTotalKudos(articles) {
  let kudos = 0;
  
  for (let article of articles) {
    kudos += article.kudos;
  }
  
  return kudos;
}

document.write(`
  <p>Maximum kudos you can give to an article: ${kudos}</p>
  <p>Total Kudos already given across all articles: ${calculateTotalKudos(articleList)}</p>
`);

// Mise à par le var que j'ai retranscrit en let, j'avoue ne pas savoir quoi améliorer de plus. Excepté passer en Jquery ou React