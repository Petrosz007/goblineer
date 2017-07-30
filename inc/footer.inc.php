            <footer class="text-center col-md-12">
               <p>Copyright Goblineer © 2017. All Rights Reserved.<br>
               World of Warcraft © is a registered trademark of Blizzard Entertainment, Inc.<br>
               Goblineer is not associated with or endorsed by Blizzard Entertainment, Inc.</p>
            </footer>
         </div>

         <div class="col-md-3 col-sm-1 col-xs-0">
         </div>
      </div>
      <script type="text/javascript">
        const endpoint = "cron/items.json";
        const items = [];

        const prom = fetch(endpoint)
            .then(blob => blob.json())
            .then(data => items.push(...data));

        function findMatches(wordToMatch, items){
            return items.filter(item => {
                const regex = new RegExp(wordToMatch, 'gi');
                return item.name.match(regex);
            });
        }


        function displayMatches() {
            if(this.value.length > 4){
                const matchArray = findMatches(this.value, items);
                const html = matchArray.map(item => {
                    const regex = new RegExp(this.value, 'gi');
                    return `
                    <option value="${item.name}">
                    `;
                }).join('');
                suggestions.innerHTML = html;
            }
        }

        const searchInput = document.querySelector('.search');
        const suggestions = document.querySelector('.suggestions');

        searchInput.addEventListener('change', displayMatches);
        searchInput.addEventListener('keyup', displayMatches);
      </script>
   </body>
</html>
