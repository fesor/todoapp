import faker from 'faker';

class Card {
  constructor(type, description) {
    this.type = type;
    this.description = description;
    this.cards = [];
    this.allowChild = true;
  }

  static theme(description) {
    return new Card('theme', description);
  }

  static epic(description) {
    return new Card('epic', description);
  }

  static story(description) {
    return new Card('story', description);
  }
}

export class StoryMap {

  get cards() {

    return [
      Card.theme(faker.random.words()),
      Card.theme(faker.random.words()),
      Card.theme(faker.random.words())
    ].map(function (card) {

      range(Math.floor(Math.random() * 4) + 1  )
        .forEach(() => card.cards.push(Card.epic(faker.random.words())));

      card.cards.forEach((card) => {
        range(Math.floor(Math.random() * 5) + 1  )
          .forEach(() => {
            const fakeCard = new Card.story(faker.random.words());
            fakeCard.allowChild = false;
            card.cards.push(fakeCard)
          });
      });

      return card;
    });
  }
}


function range(n) {
  let arr = [];
  for(let i = 0;i < n;i++) {
    arr.push(i);
  }

  return arr;
}
