drop database if exists daundoys;
create database daundoys;
use daundoys;

CREATE TABLE clientes (
    cliente_id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    endereco VARCHAR(255),
    email VARCHAR(100),
    telefone VARCHAR(20),
    senha VARCHAR(100),
    cpf VARCHAR(20)
);

CREATE TABLE produtos (
    produto_id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    descricao TEXT,
    preco DECIMAL(10, 2),
    estoque_disponivel INT,
    imagem VARCHAR(255),
    tipo VARCHAR(100)
);

CREATE TABLE pedidos (
    pedido_id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT,
    preco_pedido DECIMAL(10, 2),
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status_pedido VARCHAR(100), -- ENUM('Em processamento', 'Enviado', 'Entregue', 'Cancelado'),
    FOREIGN KEY (cliente_id) REFERENCES clientes(cliente_id)
);

CREATE TABLE itensPedido (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT,
    produto_id INT,
    quantidade INT,
    FOREIGN KEY (pedido_id) REFERENCES pedidos(pedido_id),
    FOREIGN KEY (produto_id) REFERENCES produtos(produto_id)
);

CREATE TABLE funcionarios (
    funcionario_id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    cargo VARCHAR(100),
    email VARCHAR(100),
    cpf VARCHAR(20),
    telefone VARCHAR(20),
    senha VARCHAR(100)
);



INSERT INTO produtos (nome, descricao, preco, estoque_disponivel, imagem, tipo) VALUES
("Bong Alquimia Verde", "Uma peça única que combina estilo e funcionalidade, o Bong Alquimia Verde é perfeito para quem procura uma experiência suave e envolvente ao fumar.", 69.99, 80, "produto (1).jpg", "outros"),
("Bong Cristal ReggaeSkull", "Com um design único inspirado na cultura reggae, o Bong Cristal ReggaeSkull oferece uma experiência de fumar que é tanto estilosa quanto suave.", 59.99, 80, "produto (2).jpg", "outros"),
("Charuto Cubano Cohiba Esplendidos", "Desfrute do sabor luxuoso e da qualidade excepcional do charuto Cubano Cohiba Esplendidos, feito para os verdadeiros apreciadores de charutos.", 89.99, 60, "produto (3).jpg", "charuto"),
("Caixa de charuto Habanos Selection", "Uma seleção premium de charutos Habanos apresentada em uma caixa elegante, perfeita para momentos de celebração e contemplação.", 149.99, 60, "produto (4).jpg", "charuto"),
("Charuto Dominicano Montecristo No. 2", "Com sua rica mistura de tabacos dominicanos, o charuto Dominicano Montecristo No. 2 oferece uma experiência de fumar sofisticada e memorável.", 79.99, 120, "produto (5).jpg", "charuto"),
("Charuto Hondurenho Davidoff Millennium Blend", "Experimente o equilíbrio perfeito de sabores e aromas com o charuto Hondurenho Davidoff Millennium Blend, uma escolha refinada para os conhecedores de charutos.", 69.99, 90, "produto (6).jpg", "charuto"),
("Caixa de charuto premium Don Peppin Garcia Blue Label", "Uma seleção premium de charutos Don Peppin Garcia Blue Label, esta caixa oferece uma experiência de fumar excepcional para os verdadeiros aficionados.", 99.99, 150, "produto (7).jpg", "charuto"),
("Dichavador magnético Pokebóla Red Edition", "O Dichavador magnético Pokebóla Red Edition oferece conveniência e estilo, com um design elegante e funcional que é perfeito para os entusiastas de ervas.", 29.99, 45, "produto (8).jpg", "dichavador"),
("Dichavador 'I Love Amsterdam' Silver", "Comemore seu amor por Amsterdam com o Dichavador 'I Love Amsterdam' Silver, uma peça única que combina estilo e utilidade.", 24.99, 70, "produto (9).jpg", "dichavador"),
("Dichavador de tabaco Óreo Supreme", "Desfrute do seu tabaco favorito com o Dichavador de tabaco Óreo Supreme, que apresenta um design elegante inspirado no clássico biscoito Oreo.", 34.99, 55, "produto (12).jpg", "dichavador"),
("Isqueiro de plasma Chroma Version", "O Isqueiro de plasma Chroma Version oferece uma chama livre de chama e resistente ao vento, tornando-o perfeito para uso ao ar livre.", 19.99, 140, "produto (18).jpg", "isqueiro"),
("Pipe Glaçage Étoilé", "Desfrute de uma experiência de fumar luxuosa com o Pipe Glaçage Étoilé, que apresenta um acabamento brilhante e detalhes estrelados.", 39.99, 75, "produto (25).jpg", "pipe"),
("Dichavador Bem Bolado transparente", "Com sua construção durável e design transparente, o Dichavador Bem Bolado oferece uma maneira conveniente e elegante de preparar suas ervas favoritas.", 27.99, 85, "produto (10).jpg", "dichavador"),
("Isqueiro Gold Dragoon", "O Isqueiro Gold Dragoon combina luxo e praticidade, oferecendo uma chama confiável em um design elegante e durável.", 34.99, 40, "produto (15).jpg", "isqueiro"),
("Maçarico large version", "O Maçarico large version oferece uma chama poderosa e precisa, tornando-o perfeito para acender charutos e cigarros com facilidade.", 35.99, 75, "produto (16).jpg", "isqueiro"),
("Kit 4 isqueiros personalizados", "Personalize sua experiência de fumar com o Kit 4 isqueiros personalizados, apresentando quatro designs exclusivos para atender ao seu estilo único.", 29.99, 100, "produto (17).jpg", "isqueiro"),
("Isqueiro de plasma Golden and Black Version", "Com seu design elegante em preto e dourado, o Isqueiro de plasma Golden and Black Version combina estilo e funcionalidade em uma única peça.", 39.99, 35, "produto (19).jpg", "isqueiro"),
("Kumbaya Sasso African Aborigenous Blend (25g)", "Desfrute da rica mistura de sabores africanos com o Kumbaya Sasso African Aborigenous Blend, uma escolha exótica para os conhecedores de tabaco.", 29.99, 65, "produto (20).jpg", "kambaya"),
("Cachimbo Sherlock Holmes", "Inspire-se nas aventuras do famoso detetive com o Cachimbo Sherlock Holmes, uma peça elegante que combina estilo e nostalgia.", 49.99, 30, "produto (23).jpg", "pipe"),
("Dichavador Éclat D'Or Skull Premium", "Com seu design exclusivo e detalhes dourados, o Dichavador Éclat D'Or Skull Premium é uma escolha elegante para os conhecedores de ervas.", 34.99, 95, 'produto (13).jpg', 'dichavador'),
("Pipe metal Black Window", "Com seu design robusto e elegante, o Pipe metal Black Window oferece uma experiência de fumar suave e satisfatória para os apreciadores de cachimbos.", 39.99, 90, "produto (21).jpg", "pipe"),
("Cachimbo Esculpido em Madeira de Carvalho", "Feito à mão a partir de madeira de carvalho de alta qualidade, o Cachimbo Esculpido em Madeira de Carvalho oferece uma experiência de fumar autêntica e única.", 29.99, 125, "produto (22).jpg", "pipe"),
("Pipe shape Minions", "Divirta-se com o Pipe shape Minions, uma peça única que apresenta um design divertido inspirado nos adoráveis Minions.", 49.99, 25, "produto (26).jpg", "pipe"),
("Cachimbo Dragon Slayer Silver&Oak", "Com seu design exclusivo em prata e carvalho, o Cachimbo Dragon Slayer Silver&Oak é uma escolha distinta para os apreciadores de cachimbos.", 39.99, 50, "produto (24).jpg", "pipe"),
("Piteira de vidro Holder medium size", "Desfrute de uma fumada suave e fresca com a Piteira de vidro Holder medium size, que oferece um ajuste confortável para uma experiência de fumar excepcional.", 44.99, 40, "produto (27).jpg", "piteira de vidro"),
("Isqueiro modelo Vintage Cromado", "Adicione um toque de estilo vintage ao seu kit com o Isqueiro modelo Vintage Cromado, que combina elegância e funcionalidade.", 24.99, 130, "produto (14).jpg", "isqueiro"),
("Piteira de vidro Dony long size", "Com seu design longo e elegante, a Piteira de vidro Dony long size oferece uma fumada suave e refinada para os apreciadores de fumo.", 34.99, 60, "produto (28).jpg", "piteira de vidro"),
("Piteira de vidro TwoBees short size", "A Piteira de vidro TwoBees short size oferece uma experiência de fumar suave e refrescante, com um design compacto e ergonômico.", 39.99, 85, "produto (29).jpg", "piteira de vidro"),
("Piteira de vidro Guru medium size", "Experimente uma fumada suave e aromática com a Piteira de vidro Guru medium size, projetada para proporcionar conforto e sabor.", 49.99, 20, "produto (30).jpg", "piteira de vidro"),
("Limpador de piteira Holder", "Mantenha suas piteiras limpas e livres de entupimentos com o Limpador de piteira Holder, projetado para oferecer uma limpeza eficaz e conveniente.", 39.99, 45, "produto (31).jpg", "limpador de piteira"),
("Piteira OCB organic", "Feita com materiais orgânicos de alta qualidade, a Piteira OCB organic oferece uma experiência de fumar suave e natural para os apreciadores de fumo.", 34.99, 70, "produto (32).jpg", "piteira"),
("Piteira Bem Bolado Slim", "A Piteira Bem Bolado Slim oferece uma fumada suave e refrescante, com um design fino e elegante que complementa sua experiência de fumar.", 49.99, 15, "produto (33).jpg", "piteira"),
("Piteira Bem Bolado Large", "Com seu design espaçoso e confortável, a Piteira Bem Bolado Large oferece uma fumada suave e satisfatória para os apreciadores de fumo.", 54.99, 35, "produto (34).jpg", "piteira"),
("Piteira Yellow Finger Big Brown", "Experimente uma fumada suave e aromática com a Piteira Yellow Finger Big Brown, que oferece um ajuste confortável e uma experiência de fumar excepcional.", 49.99, 55, "produto (35).jpg", "piteira"),
("Piteira Longa Papelito", "A Piteira Longa Papelito oferece uma fumada suave e fresca, com um design longo que proporciona uma experiência de fumar relaxante e satisfatória.", 44.99, 80, "produto (36).jpg", "piteira"),
("Seda Bem Bolado Large King Size Brown", "A Seda Bem Bolado Large King Size Brown oferece uma queima uniforme e consistente, com um tamanho generoso para uma experiência de fumar prolongada.", 54.99, 10, "produto (37).jpg", "seda"),
("Seda Bem Bolado Premium Large King Size", "Desfrute de uma queima suave e sem sabor com a Seda Bem Bolado Premium Large King Size, que apresenta uma qualidade excepcional para uma experiência de fumar excepcional.", 47.99, 30, "produto (38).jpg", "seda"),
("Seda Bem Bolado Slim King Size", "A Seda Bem Bolado Slim King Size oferece uma queima lenta e uniforme, com um design fino que proporciona uma experiência de fumar suave e satisfatória.", 42.99, 50, "produto (39).jpg", "seda"),
("Seda Bem Bolado 1 1/4 Large King Size", "Com sua mistura premium de fibras naturais, a Seda Bem Bolado 1 1/4 Large King Size oferece uma queima limpa e sem sabor para uma experiência de fumar excepcional.", 34.49, 75, "produto (40).jpg", "seda"),
("Seda Bem Bolado Sabotagem Edition Large King Size Brown", "Apresentando um design exclusivo e elegante, a Seda Bem Bolado Sabotagem Edition Large King Size Brown oferece uma queima suave e uma experiência de fumar única.", 59.99, 5, "produto (41).jpg", "seda"),
("Seda Smoking Deluxe King Size", "Desfrute de uma queima suave e sem sabor com a Seda Smoking Deluxe King Size, que apresenta uma qualidade excepcional para uma experiência de fumar satisfatória.", 49.75, 25, "produto (42).jpg", "seda"),
("Seda Smoking Organic King Size", "Feita com ingredientes orgânicos de alta qualidade, a Seda Smoking Organic King Size oferece uma queima limpa e sem sabor para uma experiência de fumar natural e autêntica.", 44.99, 45, "produto (43).jpg", "seda"),
("Seda Zomo Natural Perfect ultra thin leaves", "Experimente uma queima lenta e uniforme com a Seda Zomo Natural Perfect ultra thin leaves, que apresenta folhas ultrafinas para uma experiência de fumar suave e agradável.", 37.25, 70, "produto (44).jpg", "seda"),
("Seda Zomo Perfect Pink ultra thin leaves", "Com sua cor rosa vibrante, a Seda Zomo Perfect Pink ultra thin leaves adiciona um toque de estilo à sua experiência de fumar, oferecendo uma queima suave e uniforme.", 54.99, 2, "produto (45).jpg", "seda"),
("Dichavador Vintangecore classic", "O Dichavador Vintangecore classic combina estilo vintage com funcionalidade moderna, proporcionando uma experiência de preparo de ervas única.", 39.99, 110, "produto (11).jpg", "dichavador"),
("Seda OCB Slim Premium", "A Seda OCB Slim Premium oferece uma queima suave e uniforme, com um design fino e elegante que complementa sua experiência de fumar.", 54.99, 20, "produto (46).jpg", "seda"),
("King Blunt Vanille", "Desfrute do sabor doce e exótico da baunilha com o King Blunt Vanille, uma escolha deliciosa para os amantes de blunts.", 47.25, 40, "produto (47).jpg", "blunt"),
("King Blunt Grape", "Experimente o sabor suculento e refrescante da uva com o King Blunt Grape, uma opção saborosa para os apreciadores de blunts.", 69.99, 1, "produto (48).jpg", "blunt"),
("King Blunt Honey", "Com seu sabor doce e reconfortante, o King Blunt Honey oferece uma experiência de fumar suave e agradável para os amantes de blunts.", 59.75, 30, "produto (49).jpg", "blunt"),
("King Blunt Watermellon", "Refresque-se com o sabor suculento e refrescante da melancia com o King Blunt Watermellon, uma escolha deliciosa para os dias quentes de verão.", 54.99, 50, "produto (50).jpg", "blunt"),
("Cone Blunt Alena Mini Size", "O Cone Blunt Alena Mini Size oferece uma experiência de fumar conveniente e saborosa, com um tamanho compacto que é perfeito para viagens e festivais.", 54.99, 50, "produto (51).jpg", "blunt"),
("Bong Hydroponic Glass Z", "Experimente uma experiência de fumar suave e intensa com o Bong Hydroponic Glass Z, que apresenta um design moderno e funcional.", 54.99, 50, "produto (52).jpg", "outros"),
("Bong Alien Design", "Com seu design único inspirado em alienígenas, o Bong Alien Design oferece uma experiência de fumar extraterrestre que é tanto divertida quanto envolvente.", 54.99, 50, "produto (53).jpg", "outros"),
("Bong Glow in the Dark", "Ilumine sua sessão de fumar com o Bong Glow in the Dark, que brilha intensamente no escuro para uma experiência de fumar única.", 54.99, 50, "produto (54).jpg", "outros"),
("Bong Rainbow Spiral", "Adicione um toque de cor à sua sessão de fumar com o Bong Rainbow Spiral, que apresenta um design espiral vibrante e divertido.", 44.99, 50, "produto (55).jpg", "outros");

	

INSERT INTO clientes (nome, endereco, email, telefone, senha, cpf) VALUES
('Cliente 1', 'Endereço 1', 'a@a', '123456789', 'asasas', '222'),
('Cliente 2', 'Endereço 2', 'cliente2@example.com', '987654321', 'a', '333'),
('Cliente 3', 'Endereço 3', 'cliente3@example.com', '456123789', 'b', '444');


INSERT INTO funcionarios (nome, cargo, email, telefone, senha, cpf) VALUES
('Rian', 'Dono', 'a@a.com', '(88) 8 8888-8898', 'aaa', '029.997.640.81'),
('João', 'Entregador', 'joao@empresa.com', '(99) 9 9999-9999', 'senha1', '123.456.789-10'),
('Maria', 'Gerente', 'maria@empresa.com', '(99) 9 9999-9998', 'senha2', '109.876.543-21'),
('Pedro', 'Repositor', 'pedro@empresa.com', '(99) 9 9999-9997', 'senha3', '098.765.432-10'),
('Ana', 'Suporte', 'ana@empresa.com', '(99) 9 9999-9996', 'senha4', '012.345.678-90');
